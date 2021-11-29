<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\convenios;

/**
 * conveniosSearch represents the model behind the search form of `frontend\models\convenios`.
 */
class conveniosSearch extends convenios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['con_id', 'con_tipo_convenio_id', 'con_empresa_id', 'con_estado_convenio_id'], 'integer'],
            [['con_fecha_inicio', 'con_fecha_termino', 'con_url'], 'safe'],
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
        $query = convenios::find();

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
            'con_id' => $this->con_id,
            'con_tipo_convenio_id' => $this->con_tipo_convenio_id,
            'con_empresa_id' => $this->con_empresa_id,
            'con_fecha_inicio' => $this->con_fecha_inicio,
            'con_fecha_termino' => $this->con_fecha_termino,
            'con_estado_convenio_id' => $this->con_estado_convenio_id,
        ]);

        $query->andFilterWhere(['like', 'con_url', $this->con_url]);

        return $dataProvider;
    }
}
