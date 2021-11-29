<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipos_academicos".
 *
 * @property int $tesc_id
 * @property string $tesc_nombre
 * @property string $tesc_desc
 *
 * @property InfAcademica[] $infAcademicas
 */
class TiposAcademicos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_academicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tesc_desc'], 'string'],
            [['tesc_nombre'], 'string', 'max' => 30],
        ];
    }
    public static function findByID($idemp)
    {
        
        return TiposAcademicos::find()
                ->where(['tesc_id' => $idemp])        
                ->one();        
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tesc_id' => 'Tesc ID',
            'tesc_nombre' => 'Tesc Nombre',
            'tesc_desc' => 'Tesc Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfAcademicas()
    {
        return $this->hasMany(InfAcademica::className(), ['infac_tipo' => 'tesc_id']);
    }
}
