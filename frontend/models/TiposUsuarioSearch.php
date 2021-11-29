<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TiposUsuario;

/**
 * TiposUsuarioSearch represents the model behind the search form of `app\models\TiposUsuario`.
 */
class TiposUsuarioSearch extends TiposUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tus_tipo_usuario', 'tus_descripcion_tipo', 'tus_pagina_inicial'], 'safe'],
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
        $query = TiposUsuario::find();

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
        $query->andFilterWhere(['like', 'tus_tipo_usuario', $this->tus_tipo_usuario])
            ->andFilterWhere(['like', 'tus_descripcion_tipo', $this->tus_descripcion_tipo])
            ->andFilterWhere(['like', 'tus_pagina_inicial', $this->tus_pagina_inicial]);

        return $dataProvider;
    }
}
