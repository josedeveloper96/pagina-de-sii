<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresas;

/**
 * EmpresasSearch represents the model behind the search form of `app\models\Empresas`.
 */
class EmpresasSearch extends Empresas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'emp_localidad_id', 'emp_municipio_id', 'emp_estado_id', 'emp_sec_eco_emp_org_id', 'emp_tamano_emp_id'], 'integer'],
            [['emp_organismo', 'emp_giro', 'emp_razon_social', 'emp_calle', 'emp_numero', 'emp_colonia', 'emp_cp', 'emp_tel', 'emp_ext_tel', 'emp_email', 'emp_web', 'emp_comentarios', 'emp_fecha_reg'], 'safe'],
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
        $query = Empresas::find();

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
            'emp_id' => $this->emp_id,
            'emp_localidad_id' => $this->emp_localidad_id,
            'emp_municipio_id' => $this->emp_municipio_id,
            'emp_estado_id' => $this->emp_estado_id,
            'emp_sec_eco_emp_org_id' => $this->emp_sec_eco_emp_org_id,
            'emp_tamano_emp_id' => $this->emp_tamano_emp_id,
            'emp_fecha_reg' => $this->emp_fecha_reg,
        ]);

        $query->andFilterWhere(['like', 'emp_organismo', $this->emp_organismo])
            ->andFilterWhere(['like', 'emp_giro', $this->emp_giro])
            ->andFilterWhere(['like', 'emp_razon_social', $this->emp_razon_social])
            ->andFilterWhere(['like', 'emp_calle', $this->emp_calle])
            ->andFilterWhere(['like', 'emp_numero', $this->emp_numero])
            ->andFilterWhere(['like', 'emp_colonia', $this->emp_colonia])
            ->andFilterWhere(['like', 'emp_cp', $this->emp_cp])
            ->andFilterWhere(['like', 'emp_tel', $this->emp_tel])
            ->andFilterWhere(['like', 'emp_ext_tel', $this->emp_ext_tel])
            ->andFilterWhere(['like', 'emp_email', $this->emp_email])
            ->andFilterWhere(['like', 'emp_web', $this->emp_web])
            ->andFilterWhere(['like', 'emp_comentarios', $this->emp_comentarios]);

        return $dataProvider;
    }
}
