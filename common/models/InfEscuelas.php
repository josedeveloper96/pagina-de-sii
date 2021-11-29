<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inf_escuelas".
 *
 * @property int $infes_id
 * @property string $infes_nmbre
 * @property string $infes_direccion
 * @property int $infes_estado
 * @property int $infes_municipio
 * @property int $infes_localidad
 * @property string $infes_telefono
 *
 * @property InfAcademica[] $infAcademicas
 * @property Estados $infesEstado
 * @property Municipios $infesMunicipio
 * @property Localidades $infesLocalidad
 */
class InfEscuelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inf_escuelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['infes_nmbre'], 'required'],
            [['infes_estado', 'infes_municipio', 'infes_localidad'], 'integer'],
            [['infes_nmbre'], 'string', 'max' => 60],
            [['infes_direccion'], 'string', 'max' => 50],
            [['infes_telefono'], 'string', 'max' => 10],
            [['infes_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['infes_estado' => 'edo_id']],
            [['infes_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['infes_municipio' => 'mpio_id']],
            [['infes_localidad'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['infes_localidad' => 'loc_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'infes_id' => 'Infes ID',
            'infes_nmbre' => 'Nombre',
            'infes_direccion' => 'Dirección',
            'infes_estado' => 'Estado',
            'infes_municipio' => 'Municipio',
            'infes_localidad' => 'Localidad',
            'infes_telefono' => 'Teléfono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idemp)
    {
        
        return InfEscuelas::find()
                ->where(['infes_id' => $idemp])        
                ->one();        
    }
    public function getInfAcademicas()
    {
        return $this->hasMany(InfAcademica::className(), ['infac_escuela_id' => 'infes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfesEstado()
    {
        return $this->hasOne(Estados::className(), ['edo_id' => 'infes_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfesMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['mpio_id' => 'infes_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfesLocalidad()
    {
        return $this->hasOne(Localidades::className(), ['loc_id' => 'infes_localidad']);
    }
}
