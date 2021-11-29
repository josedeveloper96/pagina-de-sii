<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "medio_em".
 *
 * @property int $medio_em_id
 * @property string $medio_em_nombre
 *
 * @property InformacionLaboral[] $informacionLaborals
 */
class MedioEm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medio_em';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medio_em_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'medio_em_id' => 'Medio Em ID',
            'medio_em_nombre' => 'Medio Em Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idemp)
    {
        
        return MedioEm::find()
                ->where(['medio_em_id' => $idemp])        
                ->one();        
    }
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_medio_em_id' => 'medio_em_id']);
    }
}
