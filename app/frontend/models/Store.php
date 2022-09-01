<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Store extends ActiveRecord{

    public static function tableName()
    {
        return 'store';
    }

    public function rules()
    {
        return [
            [['store_name'], 'required'],
            [['store_name'], 'unique'],
        ];
    }

    public function attributeLabels(){
        return [
            'store_name' => 'Название склада',
            'created_at' => 'Дата создания',
        ];
    }

    public function getDevice()
    {
        return $this->hasMany(Device::class, ['store_id' => 'id']);
    }

    public function behaviors()
         {
             return [
                 'timestamp' => [
                     'class' => 'yii\behaviors\TimestampBehavior',
                     'attributes' => [
                         ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                     ],
                 ],
             ];
    }

}

