<?php

namespace common\models\SearchModels;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActiveRecord\Device;

/**
 * DeviceSearch represents the model behind the search form of `frontend\models\Device`.
 */
class DeviceSearch extends Device
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'store_id'], 'integer'],
            ['serial_number', 'string'],
            ['created_at', 'string'],
            [['store_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Device::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'store_id' => $this->store_id,
        ])
            ->andFilterWhere(['like', new \yii\db\Expression('DATE_FORMAT(created_at, "%d.%m.%Y %H:%i")'),$this->created_at])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number])
        ;
   
        return $dataProvider;
    }
}
