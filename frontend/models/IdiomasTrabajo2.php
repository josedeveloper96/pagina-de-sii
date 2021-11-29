<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idiomas_trabajo".
 *
 * @property int $idioma_tbj_id
 * @property string $idioma_tbj_nombre
 *
 * @property InformacionLaboral[] $informacionLaborals
 */
class IdiomasTrabajo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idiomas_trabajo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idioma_tbj_nombre'], 'required'],
            [['idioma_tbj_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idioma_tbj_id' => 'Idioma Tbj ID',
            'idioma_tbj_nombre' => 'Idioma Tbj Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_idiomas_trabajo_id' => 'idioma_tbj_id']);
    }
}
