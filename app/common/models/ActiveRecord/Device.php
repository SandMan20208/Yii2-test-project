<?php

namespace common\models\ActiveRecord;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Device extends ActiveRecord{

    public static function tableName()
    {
        return 'device';
    }

    public function rules()
    {
        return [
            ['serial_number', 'required'],
            ['serial_number', 'string'],
            ['serial_number', 'unique'],
            ['store_id', 'safe']
            
        ];
    }

    public function attributeLabels(){
        return [
            'serial_number' => 'Серийный номер',
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

    public function getDeviceList($id)
    {
        return $this::find()
                ->select(['device.serial_number', 'device.store_id', 'store.store_name'])
                ->joinWith('store')
                ->where(['store_id' => $id])
                ->asArray()->all();
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
                     'value' => new Expression('NOW()'),
                 ],
             ];
         }

}


