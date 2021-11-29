<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PerfilEgresado;

/**
 * PerfilEgresadoSearch represents the model behind the search form of `common\models\PerfilEgresado`.
 */
class PerfilEgresadoSearch extends PerfilEgresado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_egr_id', 'per_egr_cp', 'per_egr_municipio_id', 'per_egr_estado_id', 'per_egr_localidad_id', 'per_egr_ingles'], 'integer'],
            [['per_egr_calle', 'per_egr_no', 'per_egr_colonia', 'per_egr_tel_cel', 'per_egr_tel_casa', 'per_egr_email', 'per_egr_est_civil', 'per_egr_paq_com', 'per_egr_fecha', 'per_no_de_control', 'per_img_scr_fname', 'per_image_web_filename'], 'safe'],
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
        $query = PerfilEgresado::find();

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
            'per_egr_id' => $this->per_egr_id,
            'per_egr_cp' => $this->per_egr_cp,
            'per_egr_municipio_id' => $this->per_egr_municipio_id,
            'per_egr_estado_id' => $this->per_egr_estado_id,
            'per_egr_localidad_id' => $this->per_egr_localidad_id,
            'per_egr_ingles' => $this->per_egr_ingles,
            'per_egr_fecha' => $this->per_egr_fecha,
        ]);

        
        $query->andFilterWhere(['like', 'per_egr_calle', $this->per_egr_calle])
            ->andFilterWhere(['like', 'per_egr_no', $this->per_egr_no])
            ->andFilterWhere(['like', 'per_egr_colonia', $this->per_egr_colonia])
            ->andFilterWhere(['like', 'per_egr_tel_cel', $this->per_egr_tel_cel])
            ->andFilterWhere(['like', 'per_egr_tel_casa', $this->per_egr_tel_casa])
            ->andFilterWhere(['like', 'per_egr_email', $this->per_egr_email])
            ->andFilterWhere(['like', 'per_egr_est_civil', $this->per_egr_est_civil])
            ->andFilterWhere(['like', 'per_egr_paq_com', $this->per_egr_paq_com])
            ->andFilterWhere(['like', 'per_no_de_control', Yii::$app->session['usuario']])
            ->andFilterWhere(['like', 'per_img_scr_fname', $this->per_img_scr_fname])
            ->andFilterWhere(['like', 'per_image_web_filename', $this->per_image_web_filename]);

        return $dataProvider;
    }
}
