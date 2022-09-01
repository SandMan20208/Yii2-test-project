<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
	public static function tableName()
	{
		return 'frontend_users';
	}

	public function attributeLabels()
	{
		return [
		    
    	    'username' => 'Логин',
            'password' => 'Пароль'
        ];
	}

	public function rules()
	{
		return[
				[['username'], 'string'],
				[['password'], 'string'],
			];	
	}
}