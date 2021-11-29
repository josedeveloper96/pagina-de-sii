<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "correos_estudiantes_enviados".
 *
 * @property int $cee_id
 * @property int $cee_correo_id
 * @property int $cee_no_de_control
 */
class CorreosEstudiantesEnviados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correos_estudiantes_enviados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cee_correo_id', 'cee_no_de_control'], 'required'],
            [['cee_correo_id', 'cee_no_de_control'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cee_id' => 'Cee ID',
            'cee_correo_id' => 'Cee Correo ID',
            'cee_no_de_control' => 'Cee No De Control',
        ];
    }
}
