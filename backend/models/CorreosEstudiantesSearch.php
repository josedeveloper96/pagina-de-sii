<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CorreosEstudiantes;

/**
 * CorreosEstudiantesSearch represents the model behind the search form of `common\models\CorreosEstudiantes`.
 */
class CorreosEstudiantesSearch extends CorreosEstudiantes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ce_id', 'ce_carrera', 'ce_semestre_min', 'ce_semestre_max', 'ce_creditos_min', 'ce_creditos_max', 'ce_incluir_usycon'], 'integer'],
            [[ 'ce_asunto', 'ce_contenido', 'ce_no_de_control', 'ce_tipo_estudiante', 'ce_fecha'], 'safe'],
            [['ce_promedio_min', 'ce_promedio_max'], 'number'],
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
        $query = CorreosEstudiantes::find();

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
            'ce_id' => $this->ce_id,
            'ce_carrera' => $this->ce_carrera,
            'ce_semestre_min' => $this->ce_semestre_min,
            'ce_semestre_max' => $this->ce_semestre_max,
            'ce_creditos_min' => $this->ce_creditos_min,
            'ce_creditos_max' => $this->ce_creditos_max,
            'ce_promedio_min' => $this->ce_promedio_min,
            'ce_promedio_max' => $this->ce_promedio_max,
            'ce_incluir_usycon' => $this->ce_incluir_usycon,
            'ce_fecha' => $this->ce_fecha,
        ]);

     
     $query ->andFilterWhere(['like', 'ce_asunto', $this->ce_asunto])
            ->andFilterWhere(['like', 'ce_contenido', $this->ce_contenido])
            ->andFilterWhere(['like', 'ce_no_de_control', $this->ce_no_de_control])
            ->andFilterWhere(['like', 'ce_tipo_estudiante', $this->ce_tipo_estudiante]);

        return $dataProvider;
    }

   
}
