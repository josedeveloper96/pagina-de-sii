<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ladas;

/**
 * LadasSearch represents the model behind the search form of `common\models\Ladas`.
 */
class LadasSearch extends Ladas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'numcode', 'phonecode'], 'integer'],
            [['iso', 'name', 'nicename', 'iso3'], 'safe'],
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
        $query = Ladas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'numcode' => $this->numcode,
            'phonecode' => $this->phonecode,
        ]);

        $query->andFilterWhere(['like', 'iso', $this->iso])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nicename', $this->nicename])
            ->andFilterWhere(['like', 'iso3', $this->iso3]);

        return $dataProvider;
    }
}
