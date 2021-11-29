<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property int $mpio_id
 * @property int $mpio_estado_id Relación con estados
 * @property string $mpio_clave
 * @property string $mpio_nombre
 * @property int $mpio_activo
 *
 * @property Empresas[] $empresas
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mpio_estado_id', 'mpio_clave', 'mpio_nombre'], 'required'],
            [['mpio_estado_id'], 'integer'],
            [['mpio_clave'], 'string', 'max' => 3],
            [['mpio_nombre'], 'string', 'max' => 50],
            [['mpio_activo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mpio_id' => 'Mpio ID',
            'mpio_estado_id' => 'Mpio Estado ID',
            'mpio_clave' => 'Mpio Clave',
            'mpio_nombre' => 'Mpio Nombre',
            'mpio_activo' => 'Mpio Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idmun)
    {
        
        return Municipios::find()
                ->where(['mpio_id' => $idmun])        
                ->one();        
    }
    public function getEmpresas()
    {
        return $this->hasMany(Empresas::className(), ['emp_municipio_id' => 'mpio_id']);
    }
}
