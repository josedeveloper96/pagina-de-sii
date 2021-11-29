<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requisitos_cont".
 *
 * @property int $requisito_cont_id
 * @property string $requisito_cont_nombre
 *
 * @property InformacionLaboral[] $informacionLaborals
 */
class RequisitosCont extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisitos_cont';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requisito_cont_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'requisito_cont_id' => 'Requisito Cont ID',
            'requisito_cont_nombre' => 'Requisito Cont Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_requisitos_con_id' => 'requisito_cont_id']);
    }
}
