<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cond_tra".
 *
 * @property int $cond_tra_id
 * @property string $cond_tra_nombre
 *
 * @property InformacionLaboral[] $informacionLaborals
 */
class CondTra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cond_tra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cond_tra_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cond_tra_id' => 'Cond Tra ID',
            'cond_tra_nombre' => 'Cond Tra Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idemp)
    {
        
        return CondTra::find()
                ->where(['cond_tra_id' => $idemp])        
                ->one();        
    }
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_cond_tra_id' => 'cond_tra_id']);
    }
}
