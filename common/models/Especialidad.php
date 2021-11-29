<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "especialidad".
 *
 * @property string $espec_especialidad
 * @property string $espec_carrera
 * @property int $espec_reticula
 * @property string $espec_nombre_especialidad
 * @property string $espec_periodo_inicio
 * @property string $espec_periodo_termino
 * @property int $espec_creditos_optativos
 * @property int $espec_creditos_especialidad
 */
class Especialidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['espec_especialidad'], 'required'],
            [['espec_reticula', 'espec_creditos_optativos', 'espec_creditos_especialidad'], 'integer'],
            [['espec_especialidad', 'espec_periodo_inicio', 'espec_periodo_termino'], 'string', 'max' => 5],
            [['espec_carrera'], 'string', 'max' => 3],
            [['espec_nombre_especialidad'], 'string', 'max' => 50],
            [['espec_especialidad'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'espec_especialidad' => 'Espec Especialidad',
            'espec_carrera' => 'Espec Carrera',
            'espec_reticula' => 'Espec Reticula',
            'espec_nombre_especialidad' => 'Espec Nombre Especialidad',
            'espec_periodo_inicio' => 'Espec Periodo Inicio',
            'espec_periodo_termino' => 'Espec Periodo Termino',
            'espec_creditos_optativos' => 'Espec Creditos Optativos',
            'espec_creditos_especialidad' => 'Espec Creditos Especialidad',
        ];
    }
}
