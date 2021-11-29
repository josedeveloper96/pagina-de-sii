<?php

namespace common\models;

use Yii;
//ag grf-------------------------------------
use yii\db\ActiveRecord;
//use common\models\User;
use backend\models\Razas;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
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
 * @property string $per_no_de_control
 * @property string $per_img_scr_fname
 * @property string $per_image_web_filename
 * @property string $per_foto
 */
class PerfilEgresado extends \yii\db\ActiveRecord
{
        //ag GRF IMG
        const PERMISSIONS_PRIVATE = 10;
        const PERMISSIONS_PUBLIC = 20;  
        public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil_egresado';
    }
    
     /**
     * behaviors
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_egr_cp', 'per_egr_ingles'], 'integer'],
            [[ 'per_egr_email','per_no_de_control'], 'required'],
            [['per_egr_paq_com'], 'string'],
            [['per_egr_fecha'], 'safe'],
            [['per_egr_calle', 'per_egr_colonia'], 'string', 'max' => 100],
            [['per_egr_no', 'per_no_de_control'], 'string', 'max' => 10],
            [['per_egr_tel_cel', 'per_egr_tel_casa'], 'string', 'max' => 15],
            [['per_egr_email'], 'string', 'max' => 60],
            [['per_egr_est_civil'], 'string', 'max' => 1],
            [['per_img_scr_fname', 'per_image_web_filename'], 'string', 'max' => 200],
            [['per_egr_municipio_id','per_egr_estado_id','per_egr_localidad_id'],'safe'],
             
           //ag GRF subir archivos al server
           [['image'], 'safe'],
           [['image'], 'file', 'extensions'=>'jpg, gif, png'],
           [['image'], 'file', 'maxSize'=>'100000'],
           [['per_img_scr_fname', 'per_image_web_filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_egr_id' => 'Per Egr ID',
            'per_egr_calle' => 'Calle',
            'per_egr_no' => 'Número',
            'per_egr_colonia' => 'Colonia',
            'per_egr_cp' => 'C.P.',
            'per_egr_municipio_id' => 'Municipio',
            'per_egr_estado_id' => 'Estado',
            'per_egr_localidad_id' => 'Localidad',
            'per_egr_tel_cel' => 'Tel. Cel',
            'per_egr_tel_casa' => 'Tel. Casa',
            'per_egr_email' => 'Correo electrónico',
            'per_egr_est_civil' => 'Estado Civil',
            'per_egr_ingles' => 'Dominio de idioma extranjero (Inglés)',
            'per_egr_paq_com' => 'Manejo de paquetes computacionales',
            'per_egr_fecha' => 'Fecha de registro',
            'per_no_de_control' => 'No. De Control',
            'per_img_scr_fname' => Yii::t('app', 'Filename'),
            'per_image_web_filename' => Yii::t('app', 'Pathname'),
            'per_foto' => 'Foto',
            'updated_at' => 'Fecha y hora de actualización',
        ];
    }

    public static function getPersonalData($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('perfil_egresado.`per_egr_calle`, perfil_egresado.`per_egr_no`, perfil_egresado.`per_egr_colonia`,municipios.`mpio_nombre`,estados.`edo_nombre`,
        perfil_egresado.`per_egr_tel_casa`,perfil_egresado.`per_egr_tel_cel`,perfil_egresado.`per_egr_ingles`,perfil_egresado.`per_egr_paq_com`,perfil_egresado.`per_egr_email`
        ,perfil_egresado.`per_image_web_filename`,perfil_egresado.`per_img_scr_fname`');
        $query->from('perfil_egresado,estados,municipios,localidades');
        $query->where(' perfil_egresado.`per_no_de_control`=:num
        AND perfil_egresado.`per_egr_estado_id`=estados.`edo_id`
        AND perfil_egresado.`per_egr_municipio_id`=municipios.`mpio_id`
        AND perfil_egresado.`per_egr_localidad_id`=localidades.`loc_id`');        
        $query->orderBy(['perfil_egresado.`per_egr_id`' => SORT_DESC]);
        $query->limit('1');
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->all();
        return $raws;
    }
    public static function getPersonalCount($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('perfil_egresado');
        $query->where(' perfil_egresado.`per_no_de_control`=:num');                        
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->count();
        return $raws;
    }
    
    public static function getPeriodoact($no_de_control){
      $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('perfil_egresado');
        $query->where("perfil_egresado.`per_no_de_control`=:num"
                . " and updated_at BETWEEN (SELECT DATE_SUB(CURDATE(), INTERVAL 6 MONTH)) and NOW()");
        //$query->addbetween('updated_at','2019-01-00 00:00',new Expression('NOW()'));        
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->count();
        return $raws;  
    }
}
