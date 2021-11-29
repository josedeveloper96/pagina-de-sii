<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RefProfesionales;

/**
 * RefProfesionalesSearch represents the model behind the search form of `common\models\RefProfesionales`.
 */
class RefProfesionalesSearch extends RefProfesionales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_id'], 'integer'],
            [['ref_no_de_control', 'ref_nombres', 'ref_email', 'ref_no_cel', 'ref_ocupacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = RefProfesionales::find();

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
            'ref_id' => $this->ref_id,
        ]);

        $query->andFilterWhere(['like', 'ref_no_de_control',Yii::$app->session['usuario']])
            ->andFilterWhere(['like', 'ref_nombres', $this->ref_nombres])
            ->andFilterWhere(['like', 'ref_email', $this->ref_email])
            ->andFilterWhere(['like', 'ref_no_cel', $this->ref_no_cel])
            ->andFilterWhere(['like', 'ref_ocupacion', $this->ref_ocupacion]);

        return $dataProvider;
    }
}
