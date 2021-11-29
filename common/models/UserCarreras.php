<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_carreras".
 *
 * @property int $usc_id
 * @property int $usc_user_id
 * @property string $usc_carrera
 * @property int $usc_reticula
 */
class UserCarreras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_carreras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usc_user_id', 'usc_carrera', ], 'required'],
            [['usc_user_id', 'usc_reticula'], 'integer'],
           // [['usc_carrera'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usc_id' => 'Usc ID',
            'usc_user_id' => 'Usc User ID',
            'usc_carrera' => 'Usc Carrera',
            'usc_reticula' => 'Usc Reticula',
        ];
    }
}
