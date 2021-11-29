<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InfEscuelas;

/**
 * InfEscuelasSearch represents the model behind the search form of `common\models\InfEscuelas`.
 */
class InfEscuelasSearch extends InfEscuelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['infes_id', 'infes_estado', 'infes_municipio', 'infes_localidad'], 'integer'],
            [['infes_nmbre', 'infes_direccion', 'infes_telefono'], 'safe'],
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
        $query = InfEscuelas::find();

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
            'infes_id' => $this->infes_id,
            'infes_estado' => $this->infes_estado,
            'infes_municipio' => $this->infes_municipio,
            'infes_localidad' => $this->infes_localidad,
        ]);

        $query->andFilterWhere(['like', 'infes_nmbre', $this->infes_nmbre])
            ->andFilterWhere(['like', 'infes_direccion', $this->infes_direccion])
            ->andFilterWhere(['like', 'infes_telefono', $this->infes_telefono]);

        return $dataProvider;
    }
}
