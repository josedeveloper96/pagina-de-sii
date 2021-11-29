<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "interes_laboral".
 *
 * @property int $inl_id
 * @property string $inl_no_de_control
 * @property string $inl_cuenta_empleo S-si cuenta con empleo, N-no cuenta con empleo
 * @property string $inl_conseguir_empleo S-desea que la plataforma le busque empleo,N- no quiere empleo
 * @property string $inl_política_privacidad S-acepta política de privacidad, N-no acepta política de privacidad
 * @property string $inl_curriculum_plataforma_archivo P-plataforma, A-archivo
 * @property string $inl_url_curriculum
 */
class InteresLaboral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interes_laboral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['inl_no_de_control', 'inl_cuenta_empleo', 'inl_conseguir_empleo', 'inl_política_privacidad', 'inl_curriculum_plataforma_archivo', 'inl_url_curriculum'], 'required'],
            //[['inl_no_de_control'], 'string', 'max' => 8],
            [['inl_cuenta_empleo','inl_empleo','inl_rp','inl_ss','inl_med', 'inl_conseguir_empleo', 'inl_política_privacidad', 'inl_curriculum_plataforma_archivo'], 'string', 'max' => 1],
            [['inl_url_curriculum'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inl_id' => 'Inl ID',
            'inl_no_de_control' => 'No de Control',
            'inl_cuenta_empleo' => '',
            'inl_conseguir_empleo' => '',
            'inl_política_privacidad' => 'He leído y acepto el Aviso de Privacidad',
            'inl_curriculum_plataforma_archivo' => '',
            'inl_url_curriculum' => 'Subir tu Curriculum Vitae en formato PDF',
            'cem'=>'Cuenta con Empleo',
            'aviso'=>'Acepto AP',
            'nombre'=>'Nombre',
            'carrera'=>'Carrera',
            'sem'=>'Semstre',
            'inl_empleo' => 'Empleo',
            'inl_rp' => 'Residencia Profesional',
            'inl_ss' => 'Servicio Social',
            'inl_med' => 'Modelo de Educacion Dual',
        ];
    }

    public function getCem(){
        if($this->inl_cuenta_empleo=='S'){
            return "Con Empleo";
        }else{
            return "Sin Empleo";
        }
    }

    public function getAviso(){
        if($this->inl_política_privacidad=='1'){
            return "Aceptado";
        }else{
            return "No Aceptado";
        }
    }

    public function getNombre(){

        $row = (new \yii\db\Query())
          ->select("est_nombre_alumno,est_apellido_paterno,est_apellido_materno")
          ->from('estudiantes')
          ->where("est_no_de_control='{$this->inl_no_de_control}' ")       
          ->one();

          return "{$row['est_nombre_alumno']} {$row['est_apellido_paterno']} {$row['est_apellido_materno']}";
        
    }

    public function getCarrera(){

        $row = (new \yii\db\Query())
          ->select("c.carr_nombre_reducido")
          ->from('carreras c, estudiantes e')
          ->where("e.est_no_de_control='{$this->inl_no_de_control}' and c.carr_carrera=e.est_carrera")       
          ->one();

          return "{$row['carr_nombre_reducido']}";
        
    }

    public function getSem(){

        $row = (new \yii\db\Query())
          ->select("est_semestre")
          ->from('estudiantes')
          ->where("est_no_de_control='{$this->inl_no_de_control}' ")       
          ->one();

          return "{$row['est_semestre']}";
        
    }



}
