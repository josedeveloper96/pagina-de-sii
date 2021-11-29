<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidades".
 *
 * @property int $loc_id
 * @property int $loc_municipio_id Relación con municipios
 * @property string $loc_clave
 * @property string $loc_nombre
 * @property string $loc_latitud
 * @property string $loc_longitud
 * @property string $loc_lat
 * @property string $loc_lng
 * @property string $loc_altitud
 * @property int $loc_activo
 *
 * @property Empresas[] $empresas
 */
class Localidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_municipio_id', 'loc_clave', 'loc_nombre', 'loc_latitud', 'loc_longitud', 'loc_lat', 'loc_lng', 'loc_altitud'], 'required'],
            [['loc_municipio_id'], 'integer'],
            [['loc_lat', 'loc_lng'], 'number'],
            [['loc_clave'], 'string', 'max' => 4],
            [['loc_nombre'], 'string', 'max' => 110],
            [['loc_latitud', 'loc_longitud', 'loc_altitud'], 'string', 'max' => 15],
            [['loc_activo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'loc_municipio_id' => 'Loc Municipio ID',
            'loc_clave' => 'Loc Clave',
            'loc_nombre' => 'Loc Nombre',
            'loc_latitud' => 'Loc Latitud',
            'loc_longitud' => 'Loc Longitud',
            'loc_lat' => 'Loc Lat',
            'loc_lng' => 'Loc Lng',
            'loc_altitud' => 'Loc Altitud',
            'loc_activo' => 'Loc Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresas::className(), ['emp_localidad_id' => 'loc_id']);
    }
}
