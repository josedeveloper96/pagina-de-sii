<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "convenios".
 *
 * @property int $con_id
 * @property int $con_tipo_convenio_id
 * @property int $con_empresa_id
 * @property string $con_fecha_inicio
 * @property string $con_fecha_termino
 * @property string $con_url
 * @property int $con_estado_convenio_id
 */
class Convenios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convenios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['con_tipo_convenio_id', 'con_empresa_id', 'con_fecha_inicio', 'con_fecha_termino', 'con_url'], 'required'],
            [['con_tipo_convenio_id', 'con_empresa_id', 'con_estado_convenio_id'], 'integer'],
            [['con_fecha_inicio', 'con_fecha_termino'], 'safe'],
            [['con_url'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'con_id' => 'Con ID',
            'con_tipo_convenio_id' => 'Con Tipo Convenio ID',
            'con_empresa_id' => 'Con Empresa ID',
            'con_fecha_inicio' => 'Con Fecha Inicio',
            'con_fecha_termino' => 'Con Fecha Termino',
            'con_url' => 'Con Url',
            'con_estado_convenio_id' => 'Con Estado Convenio ID',
        ];
    }
}
