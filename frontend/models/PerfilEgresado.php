<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil_egresado".
 *
 * @property int $per_egr_id Id del perfil
 * @property string $per_egr_calle Calle. Domicilio de Egresado
 * @property string $per_egr_no Número. Domicilio de Egresado
 * @property string $per_egr_colonia Colonia. Domicilio de  Egresado
 * @property int $per_egr_cp Código Postal. Domicilio de Egresado
 * @property int $per_egr_municipio_id Municipio. Domicilio de Egresado
 * @property int $per_egr_estado_id Estado. Domicilio de Egresado
 * @property int $per_egr_localidad_id Localidad. Domicilio de Egresado
 * @property string $per_egr_tel_cel Teléfono celular de Egresado
 * @property string $per_egr_tel_casa Teléfono de casa de Egresado
 * @property string $per_egr_email e-mail de egresado
 * @property string $per_egr_est_civil S-solter,C-casado,O-otro. Estado civíl de Egresado
 * @property int $per_egr_ingles 100% 75% 50% 25% 0%. Dominio de idioma extranjero: Inglés
 * @property string $per_egr_paq_com Manejo de paquetes computacionales
 * @property string $per_egr_fecha Fecha de registro de perfil
 */
class PerfilEgresado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil_egresado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_egr_cp', 'per_egr_municipio_id', 'per_egr_estado_id', 'per_egr_localidad_id', 'per_egr_ingles'], 'integer'],
            [['per_egr_municipio_id', 'per_egr_estado_id', 'per_egr_email', 'per_egr_fecha'], 'required'],
            [['per_egr_paq_com'], 'string'],
            [['per_egr_fecha'], 'safe'],
            [['per_egr_calle', 'per_egr_colonia'], 'string', 'max' => 100],
            [['per_egr_no'], 'string', 'max' => 10],
            [['per_egr_tel_cel', 'per_egr_tel_casa'], 'string', 'max' => 15],
            [['per_egr_email'], 'string', 'max' => 60],
            [['per_egr_est_civil'], 'string', 'max' => 1],
            [['per_img_scr_fname', 'per_image_web_filename'], 'string', 'max' => 200],
            [['per_foto'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_egr_id' => 'Per Egr ID',
            'per_egr_calle' => 'Per Egr Calle',
            'per_egr_no' => 'Per Egr No',
            'per_egr_colonia' => 'Per Egr Colonia',
            'per_egr_cp' => 'Per Egr Cp',
            'per_egr_municipio_id' => 'Per Egr Municipio ID',
            'per_egr_estado_id' => 'Per Egr Estado ID',
            'per_egr_localidad_id' => 'Per Egr Localidad ID',
            'per_egr_tel_cel' => 'Per Egr Tel Cel',
            'per_egr_tel_casa' => 'Per Egr Tel Casa',
            'per_egr_email' => 'Per Egr Email',
            'per_egr_est_civil' => 'Per Egr Est Civil',
            'per_egr_ingles' => 'Per Egr Ingles',
            'per_egr_paq_com' => 'Per Egr Paq Com',
            'per_egr_fecha' => 'Per Egr Fecha',
            'per_no_de_control' => 'Per No De Control',
            'per_img_scr_fname' => 'Per Img Scr Fname',
            'per_image_web_filename' => 'Per Image Web Filename',
            'per_foto' => 'Per Foto',
        ];
    }
}
