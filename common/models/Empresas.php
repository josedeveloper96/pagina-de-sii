<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $emp_id Id Empresa
 * @property string $emp_organismo PU-PUBLICO,PR-PRIVADO,SO-SOCIAL. ID del Organismo
 * @property string $emp_giro Giro o actividad principal de la empresa u organismo
 * @property string $emp_razon_social Razón Social
 * @property string $emp_calle Calle. Domicilio de Empresa
 * @property string $emp_numero Número. Domicilio de Empresa
 * @property string $emp_colonia Colonia. Domicilio de Empresa
 * @property string $emp_cp Código Postal. Domicilio de Empresa
 * @property int $emp_localidad_id Localidad. Domicilio de Empresa
 * @property int $emp_municipio_id Municipio. Domicilio de Empresa
 * @property int $emp_estado_id Estado. Domicilio de Empresa
 * @property string $emp_tel Teléfono de Empresa.
 * @property string $emp_ext_tel Extención de tel. de Empresa
 * @property string $emp_email e-mail de Empresa
 * @property string $emp_web Página Web de Empresa
 * @property int $emp_sec_eco_emp_org_id Sector Económico de Empresa u Organización
 * @property int $emp_tamano_emp_id Tamaño de la Empresa u Organización
 * @property string $emp_comentarios Comentarios acerca de Empresa.
 * @property string $emp_fecha_reg Fecha de Registro de la Empresa
 *
 * @property Localidades $empLocalidad
 * @property Municipios $empMunicipio
 * @property Estados $empEstado
 * @property InformacionLaboral[] $informacionLaborals
 * @property Organismos $organismos
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_giro', 'emp_razon_social', 'emp_calle', 'emp_numero', 'emp_colonia', 'emp_comentarios'], 'string'],
            [['emp_localidad_id', 'emp_municipio_id', 'emp_estado_id', 'emp_sec_eco_emp_org_id', 'emp_tamano_emp_id'], 'integer'],
            [['emp_web', 'emp_fecha_reg'], 'required'],
            [['emp_fecha_reg'], 'safe'],
            [['emp_organismo'], 'string', 'max' => 2],
            [['emp_cp'], 'string', 'max' => 5],
            [['emp_tel'], 'string', 'max' => 15],
            [['emp_ext_tel'], 'string', 'max' => 10],
            [['emp_email', 'emp_web'], 'string', 'max' => 100],
            [['emp_email'],'email'],
            [['emp_localidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['emp_localidad_id' => 'loc_id']],
            [['emp_municipio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['emp_municipio_id' => 'mpio_id']],
            [['emp_estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['emp_estado_id' => 'edo_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Empresa Id',
            'emp_organismo' => 'Organismo',
            'emp_giro' => 'Giro o actividad principal de la empresa u organismo',
            'emp_razon_social' => 'Razón Social (Nombre de la empresa)',
            'emp_calle' => 'Calle',
            'emp_numero' => 'Número',
            'emp_colonia' => 'Colonia',
            'emp_cp' => 'C.P',
            'emp_localidad_id' => 'Localidad',
            'emp_municipio_id' => 'Municipio',
            'emp_estado_id' => 'Estado',
            'emp_tel' => 'Teléfono',
            'emp_ext_tel' => 'Ext',
            'emp_email' => 'e-mail',
            'emp_web' => 'Página Web',
            'emp_sec_eco_emp_org_id' => 'Sector empresarial',
            'emp_tamano_emp_id' => 'Tamaño de la empresa u organización',
            'emp_comentarios' => 'Comentarios',
            'emp_fecha_reg' => 'Fecha de registro de la empresa',
            'tamEmp' => 'Tamaño de la empresa u organización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByID($idemp)
    {
        
        return Empresas::find()
                ->where(['emp_id' => $idemp])        
                ->one();        
    }
    public function getEmpLocalidad()
    {
        return $this->hasOne(Localidades::className(), ['loc_id' => 'emp_localidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['mpio_id' => 'emp_municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpEstado()
    {
        return $this->hasOne(Estados::className(), ['edo_id' => 'emp_estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionLaborals()
    {
        return $this->hasMany(InformacionLaboral::className(), ['inf_lab_empresa_id' => 'emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganismos()
    {
        return $this->hasOne(Organismos::className(), ['org_id' => 'emp_organismo']);
    }

     public function getSector()
    {
        return $this->hasOne(SecEcoEmpOrg::className(), ['sec_eco_emp_org_id' => 'emp_sec_eco_emp_org_id']);
    }

    public function getTamEmp()
    {
        //Tamaño de la Empresa[]
        if($this->emp_tamano_emp_id==0){
         return "Microempresa (1-30)";
        }
        if($this->emp_tamano_emp_id==1){
         return "Pequeña (31-100)";
        }
        if($this->emp_tamano_emp_id==2){
         return "Mediana (101-500)";
        }
        if($this->emp_tamano_emp_id==3){
         return "Grande (más de 500)";
        }

    }

     
}
