<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SolicitudServicioSocial;

/**
 * SolicitudEstServicioSocialSearch represents the model behind the search form of `frontend\models\SolicitudServicioSocial`.
 */
class SolicitudEstServicioSocialSearch extends SolicitudServicioSocial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ss_id', 'ss_empresa_id', 'ss_modalidad_id', 'ss_tipo_programa_id', 'ss_observaciones_programa'], 'integer'],
            [['ss_no_de_control', 'ss_nombre_programa', 'ss_fecha_inicio', 'ss_fecha_termino', 'ss_actividades_resumidas', 'ss_otro_tipo_programa', 'ss_aceptado', 'ss_observaciones_sol', 'ss_responsable_programa', 'ss_area_responsable_programa', 'ss_puesto_responsable_programa', 'ss_justificiacion_programa', 'ss_objetivos_programa', 'ss_funciones_progrma', 'ss_actividades_detalladas_programa'], 'safe'],
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
        $query = SolicitudServicioSocial::find();

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
            'ss_id' => $this->ss_id,
            'ss_empresa_id' => $this->ss_empresa_id,
            'ss_modalidad_id' => $this->ss_modalidad_id,
            'ss_fecha_inicio' => $this->ss_fecha_inicio,
            'ss_fecha_termino' => $this->ss_fecha_termino,
            'ss_tipo_programa_id' => $this->ss_tipo_programa_id,
            'ss_observaciones_programa' => $this->ss_observaciones_programa,
        ]);

        $query->andFilterWhere(['like', 'ss_no_de_control', $this->ss_no_de_control])
            ->andFilterWhere(['like', 'ss_nombre_programa', $this->ss_nombre_programa])
            ->andFilterWhere(['like', 'ss_actividades_resumidas', $this->ss_actividades_resumidas])
            ->andFilterWhere(['like', 'ss_otro_tipo_programa', $this->ss_otro_tipo_programa])
            ->andFilterWhere(['like', 'ss_aceptado', $this->ss_aceptado])
            ->andFilterWhere(['like', 'ss_observaciones_sol', $this->ss_observaciones_sol])
            ->andFilterWhere(['like', 'ss_responsable_programa', $this->ss_responsable_programa])
            ->andFilterWhere(['like', 'ss_area_responsable_programa', $this->ss_area_responsable_programa])
            ->andFilterWhere(['like', 'ss_puesto_responsable_programa', $this->ss_puesto_responsable_programa])
            ->andFilterWhere(['like', 'ss_justificiacion_programa', $this->ss_justificiacion_programa])
            ->andFilterWhere(['like', 'ss_objetivos_programa', $this->ss_objetivos_programa])
            ->andFilterWhere(['like', 'ss_funciones_progrma', $this->ss_funciones_progrma])
            ->andFilterWhere(['like', 'ss_actividades_detalladas_programa', $this->ss_actividades_detalladas_programa]);

        return $dataProvider;
    }
}
