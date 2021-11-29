<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "periodos_escolares".
 *
 * @property string $pesc_periodo
 * @property string $pesc_identificacion_larga
 * @property string $pesc_identificacion_corta
 * @property string $pesc_status
 * @property string $pesc_fecha_inicio
 * @property string $pesc_fecha_termino
 * @property string $pesc_inicio_vacaciones_ss
 * @property string $pesc_termino_vacaciones_ss
 * @property int $pesc_numero_dias_clase
 * @property string $pesc_inicio_especial
 * @property string $pesc_fin_especial
 * @property string $pesc_cierre_horarios
 * @property string $pesc_cierre_seleccion
 * @property string $pesc_inicio_enc_estudiantil
 * @property string $pesc_fin_enc_estudiantil
 * @property string $pesc_inicio_sele_alumnos
 * @property string $pesc_fin_sele_alumnos
 * @property string $pesc_inicio_vacacional
 * @property string $pesc_termino_vacacional
 */
class PeriodosEscolares extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos_escolares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pesc_periodo'], 'required'],
            [['pesc_fecha_inicio', 'pesc_fecha_termino', 'pesc_inicio_vacaciones_ss', 'pesc_termino_vacaciones_ss', 'pesc_inicio_especial', 'pesc_fin_especial', 'pesc_inicio_enc_estudiantil', 'pesc_fin_enc_estudiantil', 'pesc_inicio_sele_alumnos', 'pesc_fin_sele_alumnos', 'pesc_inicio_vacacional', 'pesc_termino_vacacional'], 'safe'],
            [['pesc_numero_dias_clase'], 'integer'],
            [['pesc_periodo'], 'string', 'max' => 5],
            [['pesc_identificacion_larga'], 'string', 'max' => 30],
            [['pesc_identificacion_corta'], 'string', 'max' => 12],
            [['pesc_status', 'pesc_cierre_horarios', 'pesc_cierre_seleccion'], 'string', 'max' => 1],
            [['pesc_periodo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pesc_periodo' => 'Pesc Periodo',
            'pesc_identificacion_larga' => 'Pesc Identificacion Larga',
            'pesc_identificacion_corta' => 'Pesc Identificacion Corta',
            'pesc_status' => 'Pesc Status',
            'pesc_fecha_inicio' => 'Pesc Fecha Inicio',
            'pesc_fecha_termino' => 'Pesc Fecha Termino',
            'pesc_inicio_vacaciones_ss' => 'Pesc Inicio Vacaciones Ss',
            'pesc_termino_vacaciones_ss' => 'Pesc Termino Vacaciones Ss',
            'pesc_numero_dias_clase' => 'Pesc Numero Dias Clase',
            'pesc_inicio_especial' => 'Pesc Inicio Especial',
            'pesc_fin_especial' => 'Pesc Fin Especial',
            'pesc_cierre_horarios' => 'Pesc Cierre Horarios',
            'pesc_cierre_seleccion' => 'Pesc Cierre Seleccion',
            'pesc_inicio_enc_estudiantil' => 'Pesc Inicio Enc Estudiantil',
            'pesc_fin_enc_estudiantil' => 'Pesc Fin Enc Estudiantil',
            'pesc_inicio_sele_alumnos' => 'Pesc Inicio Sele Alumnos',
            'pesc_fin_sele_alumnos' => 'Pesc Fin Sele Alumnos',
            'pesc_inicio_vacacional' => 'Pesc Inicio Vacacional',
            'pesc_termino_vacacional' => 'Pesc Termino Vacacional',
        ];
    }
}
