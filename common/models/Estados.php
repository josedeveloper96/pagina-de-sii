<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property int $edo_id
 * @property string $edo_clave
 * @property string $edo_nombre
 * @property string $edo_abrev
 * @property int $edo_activo
 *
 * @property Empresas[] $empresas
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edo_clave', 'edo_nombre', 'edo_abrev'], 'required'],
            [['edo_clave'], 'string', 'max' => 2],
            [['edo_nombre'], 'string', 'max' => 45],
            [['edo_abrev'], 'string', 'max' => 16],
            [['edo_activo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'edo_id' => 'Edo ID',
            'edo_clave' => 'Edo Clave',
            'edo_nombre' => 'Edo Nombre',
            'edo_abrev' => 'Edo Abrev',
            'edo_activo' => 'Edo Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idemp)
    {
        
        return Estados::find()
                ->where(['edo_id' => $idemp])        
                ->one();        
    }
    public function getEmpresas()
    {
        return $this->hasMany(Empresas::className(), ['emp_estado_id' => 'edo_id']);
    }

}
