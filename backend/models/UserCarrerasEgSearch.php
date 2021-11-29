<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserCarreras;

/**
 * UserCarrerasEgSearch represents the model behind the search form of `common\models\UserCarreras`.
 */
class UserCarrerasEgSearch extends UserCarreras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usc_id', 'usc_user_id', 'usc_reticula'], 'integer'],
            [['usc_carrera'], 'safe'],
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
        $query = UserCarreras::find();

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
            'usc_id' => $this->usc_id,
            'usc_user_id' => $this->usc_user_id,
            'usc_reticula' => $this->usc_reticula,
        ]);

        $query->andFilterWhere(['like', 'usc_carrera', $this->usc_carrera]);

        return $dataProvider;
    }
}
