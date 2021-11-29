<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cla_pre".
 *
 * @property int $id
 * @property string $nombre_cla_pre nombre de la clasificación de las preguntas
 * @property int $ord
 * @property string $status
 * @property int $encuesta_id
 *
 * @property Encuestas $encuesta
 * @property Preguntas[] $preguntas
 */
class ClaPre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cla_pre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_cla_pre','encuesta_id'], 'required'],
            [['nombre_cla_pre'], 'string'],
            [['ord', 'encuesta_id'], 'integer'],
            [['status'], 'string', 'max' => 1],
           // [['encuesta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Encuestas::className(), 'targetAttribute' => ['encuesta_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_cla_pre' => 'Nombre de Oficina',
            'ord' => 'Ord',
            'status' => 'Status',
            'encuesta_id' => 'Periodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /*
    public function getEncuesta()
    {
        return $this->hasOne(Encuestas::className(), ['id' => 'encuesta_id']);
    }


    public function getPreguntas()
    {
        return $this->hasMany(Preguntas::className(), ['cla_pre_id' => 'id']);
    }
    */
}
