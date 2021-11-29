<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InteresLaboral;

/**
 * InteresLaboralSearch represents the model behind the search form of `common\models\InteresLaboral`.
 */
class InteresLaboralSearch extends InteresLaboral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inl_id', 'inl_paso'], 'integer'],
            [['inl_no_de_control', 'inl_cuenta_empleo', 'inl_conseguir_empleo', 'inl_política_privacidad', 'inl_curriculum_plataforma_archivo', 'inl_url_curriculum', 'inl_fecha_update'], 'safe'],
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
        $query = InteresLaboral::find();

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
            'inl_id' => $this->inl_id,
            'inl_fecha_update' => $this->inl_fecha_update,
            'inl_paso' => $this->inl_paso,
        ]);

        $query->andFilterWhere(['like', 'inl_no_de_control', $this->inl_no_de_control])
            ->andFilterWhere(['like', 'inl_cuenta_empleo', $this->inl_cuenta_empleo])
            ->andFilterWhere(['like', 'inl_conseguir_empleo', $this->inl_conseguir_empleo])
            ->andFilterWhere(['like', 'inl_política_privacidad', $this->inl_política_privacidad])
            ->andFilterWhere(['like', 'inl_curriculum_plataforma_archivo', $this->inl_curriculum_plataforma_archivo])
            ->andFilterWhere(['like', 'inl_url_curriculum', $this->inl_url_curriculum]);

        return $dataProvider;
    }
}
