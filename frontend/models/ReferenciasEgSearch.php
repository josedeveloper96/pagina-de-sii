<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReferenciasEg;

/**
 * ReferenciasEgSearch represents the model behind the search form of `app\models\ReferenciasEg`.
 */
class ReferenciasEgSearch extends ReferenciasEg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_id', 'reg_user_id'], 'integer'],
            [['reg_no_de_control', 'reg_email', 'reg_cel', 'reg_facebook', 'reg_linkedin', 'reg_instragram', 'reg_twitter', 'reg_skype', 'reg_comentario', 'reg_fecha'], 'safe'],
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
        $query = ReferenciasEg::find();

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
            'reg_id' => $this->reg_id,
            'reg_fecha' => $this->reg_fecha,
            'reg_user_id' => $this->reg_user_id,
        ]);

        $query->andFilterWhere(['like', 'reg_no_de_control', $this->reg_no_de_control])
            ->andFilterWhere(['like', 'reg_email', $this->reg_email])
            ->andFilterWhere(['like', 'reg_cel', $this->reg_cel])
            ->andFilterWhere(['like', 'reg_facebook', $this->reg_facebook])
            ->andFilterWhere(['like', 'reg_linkedin', $this->reg_linkedin])
            ->andFilterWhere(['like', 'reg_instragram', $this->reg_instragram])
            ->andFilterWhere(['like', 'reg_twitter', $this->reg_twitter])
            ->andFilterWhere(['like', 'reg_skype', $this->reg_skype])
            ->andFilterWhere(['like', 'reg_comentario', $this->reg_comentario]);

        return $dataProvider;
    }
}
