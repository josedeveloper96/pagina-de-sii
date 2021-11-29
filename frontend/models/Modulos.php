<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "modulos".
 *
 * @property int $mod_id
 * @property string $mod_nombre
 * @property string $mod_status 1-activo,0-inactivo
 * @property int $mod_ord
 * @property int $mod_modulo_id
 * @property string $mod_dir Carpeta contenedora
 * @property string $mod_url Archivo a abrir
 * @property int $mod_sitio 1-frontend 0-backend
 */
class Modulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_ord', 'mod_modulo_id', 'mod_sitio'], 'integer'],
            [['mod_nombre'], 'string', 'max' => 100],
            [['mod_status'], 'string', 'max' => 1],
            [['mod_dir', 'mod_url'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mod_id' => 'Mod ID',
            'mod_nombre' => 'Mod Nombre',
            'mod_status' => 'Mod Status',
            'mod_ord' => 'Mod Ord',
            'mod_modulo_id' => 'Mod Modulo ID',
            'mod_dir' => 'Mod Dir',
            'mod_url' => 'Mod Url',
            'mod_sitio' => 'Mod Sitio',
        ];
    }
}
