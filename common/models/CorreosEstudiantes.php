<?php

namespace common\models;



use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use common\models\Estudiantes;
/**
 * This is the model class for table "correos_estudiantes".
 *
 * @property int $ce_id
 * @property string $ce_descripcion
 * @property string $ce_asunto
 * @property string $ce_contenido
 * @property int $ce_carrera
 * @property string $ce_no_de_control
 * @property int $ce_cesemestre_min
 * @property int $ce_semestre_max
 * @property int $ce_creditos_min
 * @property int $ce_creditos_max
 * @property string $ce_promedio_min
 * @property string $ce_promedio_max
 * @property string $ce_tipo_estudiante
 * @property string $ce_fecha
  * @property int $ce_tipo_correo_id
 * @property int $ce_user_id
 */
class CorreosEstudiantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correos_estudiantes';
    }
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['ce_fecha'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['ce_fecha'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'ce_asunto', 'ce_contenido','ce_tipo_estudiante'], 'required'],
            [['ce_carrera', 'ce_semestre_min', 'ce_semestre_max', 'ce_creditos_min', 'ce_creditos_max'], 'integer'],
            [['ce_promedio_min', 'ce_promedio_max'], 'number'],
            [['ce_fecha'], 'safe'],
         
            [['ce_asunto'], 'string', 'max' => 200],
            [['ce_contenido'], 'string', 'max' => 8000],
            [['ce_no_de_control'], 'string', 'max' => 10],
            [['ce_tipo_estudiante'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ce_id' => 'ID',
            'ce_asunto' => 'Asunto',
            'ce_contenido' => 'Contenido',
            'ce_carrera' => 'Carrera',
            'ce_no_de_control' => 'No. de Control',
            'ce_semestre_min' => 'Semestre Minimo',
            'ce_semestre_max' => 'Semestre Maximo',
            'ce_creditos_min' => 'Creditos Minimos',
            'ce_creditos_max' => 'Creditos Maximos',
            'ce_promedio_min' => 'Promedio Minimo',
            'ce_promedio_max' => 'Promedio Maximo',
            'ce_tipo_estudiante' => 'Tipo Estudiante',
            'ce_fecha' => 'Fecha',
            'nocorreos'=>'Correos para enviar',
            'nocorreosen'=>'Correos ya enviados',
            'estu'=>'ESTATUS',
            'prom'=>'PROMEDIO',
            'sem'=>'SEMESTRE',
            'cre'=>'CREDITOS',

        ];
    }

    public function getNocorreos()
    {
        
        
        if($this->ce_no_de_control != ''){
            $no="and est_no_de_control='{$this->ce_no_de_control}'";
        }else{
            $no="";            
        }
        
        if($this->ce_carrera != ''){
            $ca="and est_carrera='{$this->ce_carrera}'";
        }else{
            $ca="";            
        }
        
        if($this->ce_semestre_min != ''){
            $se="and (est_semestre BETWEEN {$this->ce_semestre_min} AND {$this->ce_semestre_max})";
        }else{
            $se="";            
        }
        
        if($this->ce_promedio_min != ''){
            $po="and (est_promedio_final_alcanzado BETWEEN {$this->ce_promedio_min} AND {$this->ce_promedio_max})";
        }else{
            $po="";            
        }
        
        if($this->ce_creditos_min != ''){
            $cr="and (est_creditos_aprobados BETWEEN {$this->ce_creditos_min} AND {$this->ce_creditos_max})";
        }else{
            $cr="";            
        }
        
        //consulta------------------------
        $rows = (new \yii\db\Query())
          ->select("est_estatus_alumno,est_sexo,est_correo_electronico,est_nombre_alumno,est_apellido_paterno,est_apellido_materno,est_sexo")
          ->from('estudiantes')
          ->where("est_estatus_alumno='{$this->ce_tipo_estudiante}' $no $ca $se $po and est_correo_electronico <> '' and est_correo_electronico is not null")       
          ->count();
          //$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}"; 
          //consulta-----------------------------------------------------------------------------------
        
          return $rows;
    
    }
    
    public function getNocorreosen()
    {
         $envio = (new \yii\db\Query())
          ->select("*")
          ->from('correos_estudiantes_enviados')
          ->where(" cee_correo_id={$this->ce_id} ")       
          ->count();
          return $envio;
    }

     public function getEstu(){
        return $this->ce_tipo_estudiante;
    }

    public function getSem(){
        return $this->ce_semestre_min.'-'.$this->ce_semestre_max;
    }
    public function getCre(){
        return $this->ce_creditos_min.'-'.$this->ce_creditos_max;
    }

    public function getProm(){
        return $this->ce_promedio_min.'-'.$this->ce_promedio_max;
    }


    //enviar correo a egresados---------------------------------------------------------

    public static  function sendEmail($no_de_control,$email){

        $user = Estudiantes::getInfoEst($no_de_control);

        $est="{$user[0]['est_nombre_alumno']} {$user[0]['est_apellido_paterno']} {$user[0]['est_apellido_materno']}";
        if (!$user) {
            return false;
        }

        if($user[0]['est_sexo']=='M'){
            $eg='EGRESADO ';
            $ti='TITULADO ';
        }else if($user[0]['est_sexo']=='F'){
            $eg='EGRESADA ';
            $ti='TITULADA ';
        }else{
            $eg='EGRESADO(A) ';
            $ti='TITULADO (A)';
        }

        if(substr($user[0]['carr_nombre_carrera'], 0,1)=='I'){
            $gr='ING. ';
        }else if(substr($user[0]['carr_nombre_carrera'], 0,1)=='A'){
            $gr='ARQ. ';
        }else if(substr($user[0]['carr_nombre_carrera'], 0,1)=='L'){
            $gr='LIC. ';
        }

        if($user[0]['est_estatus_alumno']=='TIT'){
            //$gr='C. ';
            //$ti='Titula';
            $si='egresados';
            $sii='Sistema de Seguimiento de Egresados';
        }else if($user[0]['est_estatus_alumno']=='EGR'){
            $gr='C. ';
            $ti='';
            $si='egresados';
            $sii='Sistema de Seguimiento de Egresados';
        }else{
            if($user[0]['est_estatus_alumno']=='ACT'){
                $gr='C. ';
                $ti='';
                $eg='ESTUDIANTE';
                $si='estudiantes';
                $sii='Sistema Integral de Información II';
            }
        }

        $msj='
        <b>'.$gr.$est.'
        <br>'.$eg.$ti.'
        <br>DE LA CARRERA DE '.$user[0]['carr_nombre_carrera'].'
        <br>DEL INSTITUTO TECNOLÓGICO DE REYNOSA 
        <br>PRESENTE</b>
        <br><br>
        Los servicios educativos de este Instituto Tecnológico deben estar en mejora continua para asegurar la pertinencia de los conocimientos adquiridos y mejorar sistemáticamente, para colaborar en forma integral de nuestros alumnos.
        <br>
        <br>
        Para esto es indispensable tomarte en cuenta como factor de cambios y reformas, por lo que por este medio solicitamos tu valiosa participación y cooperación en esta investigación del '.$sii.', que nos permitirá obtener información para analizar la problemática del mercado laboral y sus características, así como las competencias laborales de nuestros '.$si.'.
        <br>
        <br>
    
        Las respuestas del '.$sii.', serán tratadas con absoluta confidencialidad y con fines meramente estadísticos, también el sistema te permitirá imprimir tu <b>Currículum Vitae</b>.
        <br><br>
        <b>URL del Sistema :</b> http://www.itreynosa.edu.mx/sii/frontend/web
        <br><b>Número de Control:</b>'.$user[0]['est_no_de_control'].' 
        <br><b>NIP:</b>'.$user[0]['est_nip'].'
        <br><br>
        Con nuestro agradecimiento por tu cooperación, recibe un cordial saludo.
        <br>
        <br>
        
       <b> A T E N T A M E N T E</b>
       <br>Educación Superior Tecnológica, un Compromiso con México®
        
        
       <br>
       <br> 
        <b>Administración del ITR
        <br>www.itreynosa.edu.mx</b>';

        \Yii::$app->mailer->htmlLayout = "layouts/html";
        return Yii::$app->mailer->compose()
            ->setFrom('web_reynosa@tecnm.mx')
            ->setTo($email)
            ->setSubject('Cordial invitación al '.$sii.' del IT Reynosa')
            ->setTextBody('Plain text content')
            ->setHtmlBody($msj)

            ->send();


        /*  */
    }
    
    
}
