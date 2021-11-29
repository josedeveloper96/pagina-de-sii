<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingreso".
 *
 * @property int $ingreso_id
 * @property string $ingreso_nombre
 *
 * @property InformacionLaboral[] $informacionLaborals
 */
class Ingreso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingreso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingreso_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ingreso_id' => 'Ingreso ID',
            'ingreso_nombre' => 'Ingreso Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_ingreso_salario_id' => 'ingreso_id']);
    }
}
