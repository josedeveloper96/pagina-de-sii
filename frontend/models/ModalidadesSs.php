<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "modalidades_ss".
 *
 * @property int $mod_id
 * @property string $mod_nombre
 */
class ModalidadesSs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modalidades_ss';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mod_id' => 'Mod ID',
            'mod_nombre' => 'Mod Nombre',
        ];
    }
}
