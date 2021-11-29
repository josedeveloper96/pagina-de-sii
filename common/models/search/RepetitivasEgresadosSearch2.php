<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RepetitivasEgresados2;

/**
 * RepetitivasEgresadosSearch2 represents the model behind the search form of `common\models\RepetitivasEgresados2`.
 */
class RepetitivasEgresadosSearch2 extends RepetitivasEgresados2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rep_egr_id'], 'integer'],
            [['rep_egr_cur_act', 'rep_egr_posgrado', 'rep_egr_cur_act_cuales', 'rep_egr_posgrado_cual', 'rep_egr_per_aso_egr', 'rep_egr_com_y_sug', 'rep_egr_act_dedica', 'rep_egr_estudia', 'rep_egr_est_otro', 'rep_egr_esp_ins', 'rep_egr_per_org_soc', 'rep_egr_per_org_soc_cuales', 'rep_egr_per_org_prof', 'rep_egr_per_org_prof_cuales', 'rep_egr_no_de_control', 'rep_egr_fecha_reg'], 'safe'],
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
        $query = RepetitivasEgresados2::find();

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
            'rep_egr_id' => $this->rep_egr_id,
            'rep_egr_fecha_reg' => $this->rep_egr_fecha_reg,
        ]);

        $query->andFilterWhere(['like', 'rep_egr_cur_act', $this->rep_egr_cur_act])
            ->andFilterWhere(['like', 'rep_egr_posgrado', $this->rep_egr_posgrado])
            ->andFilterWhere(['like', 'rep_egr_cur_act_cuales', $this->rep_egr_cur_act_cuales])
            ->andFilterWhere(['like', 'rep_egr_posgrado_cual', $this->rep_egr_posgrado_cual])
            ->andFilterWhere(['like', 'rep_egr_per_aso_egr', $this->rep_egr_per_aso_egr])
            ->andFilterWhere(['like', 'rep_egr_com_y_sug', $this->rep_egr_com_y_sug])
            ->andFilterWhere(['like', 'rep_egr_act_dedica', $this->rep_egr_act_dedica])
            ->andFilterWhere(['like', 'rep_egr_estudia', $this->rep_egr_estudia])
            ->andFilterWhere(['like', 'rep_egr_est_otro', $this->rep_egr_est_otro])
            ->andFilterWhere(['like', 'rep_egr_esp_ins', $this->rep_egr_esp_ins])
            ->andFilterWhere(['like', 'rep_egr_per_org_soc', $this->rep_egr_per_org_soc])
            ->andFilterWhere(['like', 'rep_egr_per_org_soc_cuales', $this->rep_egr_per_org_soc_cuales])
            ->andFilterWhere(['like', 'rep_egr_per_org_prof', $this->rep_egr_per_org_prof])
            ->andFilterWhere(['like', 'rep_egr_per_org_prof_cuales', $this->rep_egr_per_org_prof_cuales])
            ->andFilterWhere(['like', 'rep_egr_no_de_control', $this->rep_egr_no_de_control]);

        return $dataProvider;
    }
}
