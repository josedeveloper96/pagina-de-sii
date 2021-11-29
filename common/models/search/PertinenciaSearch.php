<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pertinencia;

/**
 * PertinenciaSearch represents the model behind the search form of `app\models\Pertinencia`.
 */
class PertinenciaSearch extends Pertinencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_no_de_control', 'per_fecha_registro'], 'safe'],
            [['per_cal_doc', 'per_plan_es', 'per_opr_part', 'per_enf_inv', 'per_sat_con', 'per_exp_obt', 'per_tiempo_tran_prim_emp_id'], 'integer'],
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
        $query = Pertinencia::find();

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
            'per_cal_doc' => $this->per_cal_doc,
            'per_plan_es' => $this->per_plan_es,
            'per_opr_part' => $this->per_opr_part,
            'per_enf_inv' => $this->per_enf_inv,
            'per_sat_con' => $this->per_sat_con,
            'per_exp_obt' => $this->per_exp_obt,
            'per_tiempo_tran_prim_emp_id' => $this->per_tiempo_tran_prim_emp_id,
            'per_fecha_registro' => $this->per_fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'per_no_de_control',Yii::$app->session['usuario']]);

        return $dataProvider;
    }
}
