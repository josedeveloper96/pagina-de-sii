<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_programas_ss".
 *
 * @property int $tip_id
 * @property string $tip_nombre
 */
class TipoProgramasSs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_programas_ss';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_id' => 'Tip ID',
            'tip_nombre' => 'Tip Nombre',
        ];
    }
}
