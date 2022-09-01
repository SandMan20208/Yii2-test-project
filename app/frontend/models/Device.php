<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Device extends ActiveRecord{

    public static function tableName()
    {
        return 'device';
    }

    public function rules()
    {
        return [
            [['serial_numb'], 'required'],
            [['serial_numb'], 'integer'],
            [['serial_numb'], 'unique'],
            [['store_id'], 'safe']
            
        ];
    }

    public function attributeLabels(){
        return [
            'serial_numb' => 'Серийный номер',
            'store_id' => 'Название склада',
            'created_at' => 'Дата создания',
        ];
    }

    public function getStore()
    {
        return $this->hasOne(Store::class, ['id' => 'store_id']);
    }

    public function getStoreName() {
        return $this->store->store_name;
    }


    public function getCreatedAt()
    {
        return date('d.m.Y', $this->created_at);
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


