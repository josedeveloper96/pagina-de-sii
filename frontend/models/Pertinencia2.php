<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pertinencia".
 *
 * @property string $per_no_de_control Identificador
 * @property int $per_cal_doc 4-muy bueno,3 bueno,2 regular, 1 mala. P1: Calidad de los docentes
 * @property int $per_plan_es 4-muy bueno,3 bueno,2 regular, 1 mala. P2: Plan de Estudios
 * @property int $per_opr_part 4-muy bueno,3 bueno,2 regular, 1 mala. P3: Oportunidad de participar en proyectos de investigación y desarrollo
 * @property int $per_enf_inv 4-muy bueno,3 bueno,2 regular, 1 mala. P4: Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza
 * @property int $per_sat_con 4-muy bueno,3 bueno,2 regular, 1 mala. P5: Satisfacción con las condiciones de estudio (infraestructura)
 * @property int $per_exp_obt 4-muy bueno,3 bueno,2 regular, 1 mala. 6) Experiencia obtenida a través de la residencia profesional
 * @property int $per_tiempo_tran_prim_emp_id III.2 En caso de trabajar. tiempo transcurrido para obtener el primer empleo
 * @property string $per_fecha_registro Fecha de registro pertinencia
 *
 * @property TiempoPrimerEmpleo $perTiempoTranPrimEmp
 */
class Pertinencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pertinencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_no_de_control', 'per_cal_doc', 'per_plan_es', 'per_opr_part', 'per_enf_inv', 'per_sat_con', 'per_exp_obt', 'per_fecha_registro'], 'required'],
            [['per_cal_doc', 'per_plan_es', 'per_opr_part', 'per_enf_inv', 'per_sat_con', 'per_exp_obt', 'per_tiempo_tran_prim_emp_id'], 'integer'],
            [['per_fecha_registro'], 'safe'],
            [['per_no_de_control'], 'string', 'max' => 10],
            [['per_no_de_control'], 'unique'],
            [['per_tiempo_tran_prim_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TiempoPrimerEmpleo::className(), 'targetAttribute' => ['per_tiempo_tran_prim_emp_id' => 'tie_pem_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_no_de_control' => 'Número de control del encuestado',
            'per_cal_doc' => '1. Calidad de los docentes:',
            'per_plan_es' => '2. Plan de Estudios:',
            'per_opr_part' => '3. Oportunidad de participar en proyectos de investigación y desarrollo:',
            'per_enf_inv' => '4. Énfasis que se le prestaba a la investigación y desarrollo:',
            'per_sat_con' => '5. Satisfacción con las condiciones de estudio (infraestructura):',
            'per_exp_obt' => '6. Experiecia obtenida a través de la residencia profesional:',
            'per_tiempo_tran_prim_emp_id' => 'Id de la pregunta "Tiempo transcurrido para obtener el primer empleo"',
            'per_fecha_registro' => 'Fecha de registro de la encuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerTiempoTranPrimEmp()
    {
        return $this->hasOne(TiempoPrimerEmpleo::className(), ['tie_pem_id' => 'per_tiempo_tran_prim_emp_id']);
    }
}
