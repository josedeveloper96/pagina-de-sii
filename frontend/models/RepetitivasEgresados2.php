<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repetitivas_egresados".
 *
 * @property int $rep_egr_id Id pregunta repetitiva
 * @property string $rep_egr_cur_act S-si, N- no. V. VI.1 ¿Le gustaría tomar cursos de actualización?
 * @property string $rep_egr_posgrado S-si, N- no. V. VI.2 ¿Le gustaría tomar algún postgrado?
 * @property string $rep_egr_cur_act_cuales V. VI.1 ¿Cuáles?
 * @property string $rep_egr_posgrado_cual V. VI.2 ¿Cuál?
 * @property string $rep_egr_per_aso_egr S-si, N- no. V. VII.3 ¿Pertenece a la asociación de egresados?
 * @property string $rep_egr_com_y_sug VII. Comentarios y Sugerencias
 * @property string $rep_egr_act_dedica EST- ESTUDIA,TRA-TRABAJA, EYT-ESTUDIA Y TRABA, NET, NO ESTUDIA NI TRABAJA- III.1 ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE.
 * @property string $rep_egr_estudia E-ESPECIALIDAD,M-MAESTRIA,D-DOCTORADO,I-IDIOMAS,O-OTROS. III.1.2 Si estudia, indicar si
 * @property string $rep_egr_est_otro Si estudia, indicar si (OTRO, ¿Cuál?)
 * @property string $rep_egr_esp_ins III.1 Especialidad e institución
 * @property string $rep_egr_per_org_soc S-sí, N-no. ¿Pertenece a organizaciones sociales?
 * @property string $rep_egr_per_org_soc_cuales ¿Cuáles?
 * @property string $rep_egr_per_org_prof S-si, N-no. ¿Pertenece a organismos de profesionistas?
 * @property string $rep_egr_per_org_prof_cuales ¿Cuáles?
 * @property string $rep_egr_no_de_control para identificar al egresado
 *
 * @property Estudiantes $repEgrNoDeControl
 */
class RepetitivasEgresados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repetitivas_egresados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rep_egr_cur_act_cuales', 'rep_egr_posgrado_cual', 'rep_egr_com_y_sug', 'rep_egr_est_otro', 'rep_egr_esp_ins', 'rep_egr_per_org_soc_cuales', 'rep_egr_per_org_prof_cuales'], 'string'],
            [['rep_egr_no_de_control'], 'required'],
            [['rep_egr_cur_act', 'rep_egr_posgrado', 'rep_egr_per_aso_egr', 'rep_egr_estudia', 'rep_egr_per_org_soc', 'rep_egr_per_org_prof'], 'string', 'max' => 1],
            [['rep_egr_act_dedica'], 'string', 'max' => 3],
            [['rep_egr_no_de_control'], 'string', 'max' => 10],
            [['rep_egr_no_de_control'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiantes::className(), 'targetAttribute' => ['rep_egr_no_de_control' => 'est_no_de_control']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        // Por: María Luisa Montes
        return [
            'rep_egr_id' => 'Id de la pregunta',
            'rep_egr_act_dedica' => 'Actividad a la que se dedica actualmente:',
            'rep_egr_estudia' => 'Si estudia, indicar si:',
            'rep_egr_est_otro' => 'Otra:',
            'rep_egr_esp_ins' => 'Especialidad e institución:',
            'rep_egr_cur_act' => '¿Le gustaría tomar cursos de actualización?:',
            'rep_egr_cur_act_cuales' => '¿Cuáles?:',
            'rep_egr_posgrado' => '¿Le gustaría tomar algún Postgrado?:',
            'rep_egr_posgrado_cual' => '¿Cuál?:',
            'rep_egr_per_org_soc' => '¿Pertenece a organizaciones sociales?:',
            'rep_egr_per_org_soc_cuales' => '¿Cuáles?:',
            'rep_egr_per_org_prof' => '¿Pertenece a organismos de profesionistas?:',
            'rep_egr_per_org_prof_cuales' => '¿Cuáles?:',
            'rep_egr_per_aso_egr' => '¿Pertenece a la asociación de egresados?:',
            'rep_egr_com_y_sug' => 'Opinión o recomendación para mejorar la formación profesional de un egresado de su carrera:',
            'rep_egr_no_de_control' => 'Número de Control del Alumno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepEgrNoDeControl()
    {
        return $this->hasOne(Estudiantes::className(), ['est_no_de_control' => 'rep_egr_no_de_control']);
    }
}
