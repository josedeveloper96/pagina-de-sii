<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InformacionLaboral;

/**
 * informacionLaboralsearch represents the model behind the search form of `app\models\InformacionLaboral`.
 */
class informacionLaboralsearch extends InformacionLaboral
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inf_lab_id', 'inf_lab_empresa_id', 'inf_lab_medio_em_id', 'inf_lab_requisitos_con_id', 'inf_lab_nivel_jer_id', 'inf_lab_ingreso_salario_id', 'inf_lab_cond_tra_id', 'inf_lab_rel_for', 'inf_lab_idiomas_trabajo_id', 'inf_lab_uso_ie_hablar', 'inf_lab_uso_ie_escribir', 'inf_lab_uso_ie_leer', 'inf_lab_uso_ie_escuchar', 'inf_lab_are_cam_est', 'inf_lab_titulacion', 'inf_lab_exp_lab', 'inf_lab_com_lab', 'inf_lab_pos_int_egre', 'inf_lab_con_idio_ext', 'inf_lab_rec_ref', 'inf_lab_per_act', 'inf_lab_cap_lid'], 'integer'],
            [['inf_lab_fecha_ing_emp', 'ing_lab_fecha_ter_emp', 'inf_lab_nombre_ji', 'inf_lab_puesto_ji', 'inf_lab_telefono_ji', 'inf_lab_ext_ji', 'inf_lab_email_ji', 'inf_lab_no_de_control', 'inf_lab_otro_medio_em', 'inf_lab_otro_requisitos_con', 'inf_lab_otro_cond_tra', 'inf_lab_otro_idioma', 'inf_lab_efi_rea_act', 'inf_lab_com_cal_for_aca', 'inf_lab_uti_res_pro', 'inf_lab_fecha_registro'], 'safe'],
            [['inf_lab_email_ji'],'email'],
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
        $query = InformacionLaboral::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $_SESSION['exportData'] = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        unset($_SESSION['exportData']);

        $_SESSION['exportData'] = $dataProvider;
    $session = Yii::$app->session;
        // grid filtering conditions
        $query->andFilterWhere([
            'inf_lab_id' => $this->inf_lab_id,
            'inf_lab_fecha_ing_emp' => $this->inf_lab_fecha_ing_emp,
            'ing_lab_fecha_ter_emp' => $this->ing_lab_fecha_ter_emp,
            'inf_lab_empresa_id' => $this->inf_lab_empresa_id,
            'inf_lab_medio_em_id' => $this->inf_lab_medio_em_id,
            'inf_lab_requisitos_con_id' => $this->inf_lab_requisitos_con_id,
            'inf_lab_nivel_jer_id' => $this->inf_lab_nivel_jer_id,
            'inf_lab_ingreso_salario_id' => $this->inf_lab_ingreso_salario_id,
            'inf_lab_cond_tra_id' => $this->inf_lab_cond_tra_id,
            'inf_lab_rel_for' => $this->inf_lab_rel_for,
            'inf_lab_idiomas_trabajo_id' => $this->inf_lab_idiomas_trabajo_id,
            'inf_lab_uso_ie_hablar' => $this->inf_lab_uso_ie_hablar,
            'inf_lab_uso_ie_escribir' => $this->inf_lab_uso_ie_escribir,
            'inf_lab_uso_ie_leer' => $this->inf_lab_uso_ie_leer,
            'inf_lab_uso_ie_escuchar' => $this->inf_lab_uso_ie_escuchar,
            'inf_lab_are_cam_est' => $this->inf_lab_are_cam_est,
            'inf_lab_titulacion' => $this->inf_lab_titulacion,
            'inf_lab_exp_lab' => $this->inf_lab_exp_lab,
            'inf_lab_com_lab' => $this->inf_lab_com_lab,
            'inf_lab_pos_int_egre' => $this->inf_lab_pos_int_egre,
            'inf_lab_con_idio_ext' => $this->inf_lab_con_idio_ext,
            'inf_lab_rec_ref' => $this->inf_lab_rec_ref,
            'inf_lab_per_act' => $this->inf_lab_per_act,
            'inf_lab_cap_lid' => $this->inf_lab_cap_lid,
            'inf_lab_fecha_registro' => $this->inf_lab_fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'inf_lab_nombre_ji', $this->inf_lab_nombre_ji])
            ->andFilterWhere(['like', 'inf_lab_puesto_ji', $this->inf_lab_puesto_ji])
            ->andFilterWhere(['like', 'inf_lab_telefono_ji', $this->inf_lab_telefono_ji])
            ->andFilterWhere(['like', 'inf_lab_ext_ji', $this->inf_lab_ext_ji])
            ->andFilterWhere(['like', 'inf_lab_email_ji', $this->inf_lab_email_ji])
            ->andFilterWhere(['like', 'inf_lab_no_de_control',Yii::$app->session['usuario']])
            ->andFilterWhere(['like', 'inf_lab_otro_medio_em', $this->inf_lab_otro_medio_em])
            ->andFilterWhere(['like', 'inf_lab_otro_requisitos_con', $this->inf_lab_otro_requisitos_con])
            ->andFilterWhere(['like', 'inf_lab_otro_cond_tra', $this->inf_lab_otro_cond_tra])
            ->andFilterWhere(['like', 'inf_lab_otro_idioma', $this->inf_lab_otro_idioma])
            ->andFilterWhere(['like', 'inf_lab_efi_rea_act', $this->inf_lab_efi_rea_act])
            ->andFilterWhere(['like', 'inf_lab_com_cal_for_aca', $this->inf_lab_com_cal_for_aca])
            ->andFilterWhere(['like', 'inf_lab_uti_res_pro', $this->inf_lab_uti_res_pro]);

        return $dataProvider;
    }
    public static function getExportData() 
    {
        $data = [
                'data'=>$_SESSION['exportData'],
                'fileName'=>'Report', 
                'title'=>'Report',
                'exportFile'=>'@frontend/views/informacion-laboral/testpdf',
            ];
        return $data;
    }
}
