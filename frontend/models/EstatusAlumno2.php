<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_alumno".
 *
 * @property string $estatus_al_id
 * @property string $estatus_al_descripcion
 */
class EstatusAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estatus_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estatus_al_id'], 'required'],
            [['estatus_al_id'], 'string', 'max' => 3],
            [['estatus_al_descripcion'], 'string', 'max' => 100],
            [['estatus_al_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estatus_al_id' => 'Estatus Al ID',
            'estatus_al_descripcion' => 'Estatus Al Descripcion',
        ];
    }
}
