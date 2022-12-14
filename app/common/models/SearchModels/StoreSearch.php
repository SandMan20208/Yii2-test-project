<?php

namespace common\models\SearchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActiveRecord\Store;

/**
 * StoreSearch represents the model behind the search form of `frontend\models\Store`.
 */
class StoreSearch extends Store
{
    /**
     * {@inheritdoc}
     */

    
    public function rules()
    {
        return [
            [['store_name'], 'string'],
            [['created_at'], 'string'],
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
        $query = Store::find();

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
        $query->andFilterWhere(['like', 'store_name', $this->store_name ])
            ->andFilterWhere(['like', new \yii\db\Expression('DATE_FORMAT(created_at, "%d.%m.%Y %H:%i")'),$this->created_at]);
    

        return $dataProvider;
    }
}
