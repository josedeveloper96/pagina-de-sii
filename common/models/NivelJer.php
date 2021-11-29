<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nivel_jer".
 *
 * @property int $nivel_jer_id
 * @property string $nivel_jer_nombre
 *
 * @property InformacionLaboral[] $informacionLaborals
 */
class NivelJer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivel_jer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nivel_jer_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nivel_jer_id' => 'Nivel Jer ID',
            'nivel_jer_nombre' => 'Nivel Jer Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idemp)
    {
        
        return NivelJer::find()
                ->where(['nivel_jer_id' => $idemp])        
                ->one();        
    }
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_nivel_jer_id' => 'nivel_jer_id']);
    }
}
