<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use common\models\Carreras;
use common\models\EstudiantesGenerales;
use common\models\PeriodosEscolares;

use yii\helpers\Html;
use common\models\PerfilEgresado;
use common\models\InformacionLaboral;
use common\models\InfAcademica;
use common\models\RefProfesionales;
use common\models\Pertinencia;
use yii\helpers\Url;

use common\models\Estudiantes;


/**
 * This is the model class for table "estudiantes".
 *
 * @property string $est_no_de_control
 * @property string $est_carrera
 * @property int $est_reticula
 * @property string $est_nivel_escolar
 * @property string $est_especialidad
 * @property int $est_semestre
 * @property string $est_clave_interna
 * @property string $est_estatus_alumno
 * @property string $est_plan_de_estudios
 * @property string $est_apellido_paterno
 * @property string $est_apellido_materno
 * @property string $est_nombre_alumno
 * @property string $est_curp_alumno
 * @property string $est_fecha_nacimiento
 * @property string $est_sexo
 * @property string $est_estado_civil
 * @property int $est_tipo_ingreso
 * @property string $est_periodo_ingreso_it
 * @property string $est_ultimo_periodo_inscrito
 * @property string $est_promedio_periodo_anterior
 * @property string $est_promedio_aritmetico_acumulado
 * @property int $est_creditos_aprobados
 * @property int $est_creditos_cursados
 * @property string $est_promedio_final_alcanzado
 * @property string $est_tipo_servicio_medico
 * @property string $est_clave_servicio_medico
 * @property string $est_escuela_procedencia
 * @property int $est_tipo_escuela
 * @property string $est_domicilio_escuela
 * @property int $est_entidad_procedencia
 * @property int $est_ciudad_procedencia
 * @property string $est_correo_electronico
 * @property string $est_foto
 * @property string $est_firma
 * @property int $est_periodos_revalidacion
 * @property int $est_indice_reprobacion_acumulado
 * @property string $est_becado_por
 * @property int $est_nip
 * @property string $est_tipo_alumno
 * @property string $est_nacionalidad
 * @property string $est_usuario
 * @property string $est_fecha_actualizacion
 * 
 * 
 * @property Carreras $estCarrera
 * @property PeriodosEscolares $estCarrera
 * @property RepetitivasEgresados[] $repetitivasEgresados
 */
class Estudiantes extends \yii\db\ActiveRecord 
{
    
    /*Declarar variables constantes que almacenen los valores que deseo comparar
        como el status si es egresado o titulado     */
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiantes';
    }

    /**
     * @inheritdoc
     */
    /*aqui agregaré las funciones necesarias de validación que permitiran al usuario ingresar con su numeor de control 
y de contraseña como su nip     */
//        public function behaviors()
//    {
//        return [
//            TimestampBehavior::className(),
//        ];
//    }
    public static function findByUsername($username)
    {
        //return static::findOne(['est_no_de_control' => $username]); original
        return Estudiantes::find()
                ->where(['est_no_de_control' => $username])               
                ->one();
        /* codigo de prueba para ver la sintaxis de condicionar el pedido del numero de control
        $model = Launch::find()
    ->where(['id' => $id)
    ->andWhere(['status'=>Launch::ACTIVE_REQUEST])
    ->orWhere(['status'=>Launch::FUTURE_REQUEST])
         */
    }
    
    public function validatePassword($password)
    {
        return static::findOne(['est_nip' => $password]);        
    }
    /*fin de mi código*/
    public function rules()
    {
        return [
            [['est_no_de_control'], 'required'],
            [['est_reticula', 'est_semestre', 'est_tipo_ingreso', 'est_creditos_aprobados', 'est_creditos_cursados', 'est_tipo_escuela', 'est_entidad_procedencia', 'est_ciudad_procedencia', 'est_periodos_revalidacion', 'est_indice_reprobacion_acumulado', 'est_nip'], 'integer'],
            [['est_fecha_nacimiento', 'est_fecha_actualizacion','est_foto'], 'safe'],
            [['est_promedio_periodo_anterior', 'est_promedio_aritmetico_acumulado', 'est_promedio_final_alcanzado'], 'number'],
            [['est_no_de_control', 'est_clave_interna'], 'string', 'max' => 10],
            [['est_carrera', 'est_estatus_alumno', 'est_nacionalidad', 'est_usuario'], 'string', 'max' => 3],
            [['est_nivel_escolar', 'est_plan_de_estudios', 'est_sexo', 'est_estado_civil', 'est_tipo_servicio_medico'], 'string', 'max' => 1],
            [['est_especialidad', 'est_periodo_ingreso_it', 'est_ultimo_periodo_inscrito'], 'string', 'max' => 5],
            [['est_apellido_paterno', 'est_apellido_materno'], 'string', 'max' => 45],
            [['est_nombre_alumno', 'est_foto', 'est_firma', 'est_becado_por'], 'string', 'max' => 100],
            [['est_curp_alumno'], 'string', 'max' => 18],
            [['est_clave_servicio_medico'], 'string', 'max' => 20],
            [['est_escuela_procedencia'], 'string', 'max' => 50],
            [['est_domicilio_escuela'], 'string', 'max' => 60],
            [['est_correo_electronico'], 'string', 'max' => 200],
            [['est_correo_electronico'],'email'],
            [['est_tipo_alumno'], 'string', 'max' => 2],
            [['est_no_de_control'], 'unique'],
            [['est_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::className(), 'targetAttribute' => ['est_carrera' => 'carr_carrera']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'est_no_de_control' => 'No. Control',
            'est_carrera' => 'Carrera',
            'est_reticula' => 'Reticula',
            'est_nivel_escolar' => 'Nivel Escolar',
            'est_especialidad' => 'Especialidad',
            'est_semestre' => 'Semestre',
            'est_clave_interna' => 'Clave Interna',
            'est_estatus_alumno' => 'Estatus de Alumno',
            'est_plan_de_estudios' => 'Plan de Estudios',
            'est_apellido_paterno' => 'Apellido Paterno',
            'est_apellido_materno' => 'Apellido Materno',
            'est_nombre_alumno' => 'Nombre(s)',
            'est_curp_alumno' => 'CURP',
            'est_fecha_nacimiento' => 'Fecha Nacimiento',
            'est_sexo' => 'Sexo',
            'est_estado_civil' => 'Estado Civil',
            'est_tipo_ingreso' => 'Tipo Ingreso',
            'est_periodo_ingreso_it' => 'Periodo Ingreso It',
            'est_ultimo_periodo_inscrito' => 'Ultimo Periodo Inscrito',
            'est_promedio_periodo_anterior' => 'Promedio Periodo Anterior',
            'est_promedio_aritmetico_acumulado' => 'Promedio Aritmetico Acumulado',
            'est_creditos_aprobados' => 'Creditos Aprobados',
            'est_creditos_cursados' => 'Creditos Cursados',
            'est_promedio_final_alcanzado' => 'Promedio Final Alcanzado',
            'est_tipo_servicio_medico' => 'Tipo Servicio Medico',
            'est_clave_servicio_medico' => 'Clave Servicio Medico',
            'est_escuela_procedencia' => 'Escuela Procedencia',
            'est_tipo_escuela' => 'Tipo Escuela',
            'est_domicilio_escuela' => 'Domicilio Escuela',
            'est_entidad_procedencia' => 'Entidad Procedencia',
            'est_ciudad_procedencia' => 'Ciudad Procedencia',
            'est_correo_electronico' => 'Correo Electrónico',
            'est_foto' => 'Foto',
            'est_firma' => 'Firma',
            'est_periodos_revalidacion' => 'Periodos Revalidacion',
            'est_indice_reprobacion_acumulado' => 'Indice Reprobacion Acumulado',
            'est_becado_por' => 'Becado Por',
            'est_nip' => 'Nip',
            'est_tipo_alumno' => 'Tipo Alumno',
            'est_nacionalidad' => 'Nacionalidad',
            'est_usuario' => 'Usuario',
            'carr' => 'Carrera',
            'nmbrCarr' => 'Carrera',
            'estatus' => 'Estatus',
            'telefono' => 'Teléfono',
            'est_fecha_actualizacion' => 'Fecha Actualizacion',
            'ubicacion' => Yii::t('app', 'Ubicacion y seguimiento'),
        ];
    }
    //relaciones:
    /* ActiveRelation */
    public function getPerfilEgresado()
    {
        return $this->hasOne(PerfilEgresado::className(), ['id' => 'per_egr_id']);
    }
    /*********************************************************************/
    /*Funciones para los gridview aqui se puede crear campos calculados y relaciones*/
    public function getEnc1(){
        return Pertinencia::find()->where(['per_no_de_control' => $this->est_no_de_control])->count();
    }
    public function getEnc2(){
        $conteo= RepetitivasEgresados::find()->where(['rep_egr_no_de_control' => $this->est_no_de_control])->count();
        if($conteo>0){
            return "Contestada";
        }else{
            return "No contestada";
        }
        
    }
    public function getubicacions(){
        //Estudiantes::find()->count();
        return $this->hasOne(PerfilEgresado::className(), ['per_no_de_control' => 'est_no_de_control']);
    }
    public function getUbicacion(){
        //Estudiantes::find()->count();
         return PerfilEgresado::find()->where(['per_no_de_control' => $this->est_no_de_control])->count();
    }
    public function getworkList(){
        //Estudiantes::find()->count();
        return InformacionLaboral::find()->where(['inf_lab_no_de_control' => $this->est_no_de_control])->count();
    }
    public static function getPersonalData($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('estudiantes.est_nombre_alumno,estudiantes.est_apellido_paterno,
        estudiantes.est_apellido_materno,estudiantes.est_foto,
        estudiantes.est_fecha_nacimiento,estudiantes.est_curp_alumno');
        $query->from('estudiantes');
        $query->where('estudiantes.est_no_de_control=:num');
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->all();
        return $raws;
    }
    public function getnmbrCarr()
    {
        return $this->hasOne(Carreras::className(),['carr_carrera' => 'est_carrera','carr_reticula' => 'est_reticula']);
    }
    public function getCarr()
    {

        if($this->est_carrera=='' or $this->est_reticula==''){

            return 'sin registro';

        }else{

            //return $this->hasOne(Carreras::className(),['carr_carrera' => 'est_carrera','carr_reticula' => 'est_reticula']);
            $carr= Carreras::find()->where(['carr_carrera' => $this->est_carrera,'carr_reticula' => $this->est_reticula])->one();
            return $carr->carr_nombre_carrera;

        }

    }
    public function getTelefono()
    {
        //return $this->hasOne(Carreras::className(),['carr_carrera' => 'est_carrera','carr_reticula' => 'est_reticula']);
        $carr= EstudiantesGenerales::find()->where(['est_gral_no_de_control' => $this->est_no_de_control])->one();
        return $carr->est_gral_telefono;
    }
    
    public function getEstatus(){
        if($this->est_estatus_alumno=='ACT'){
            return 'ESTUDIANTE ACTIVO';
        }else if($this->est_estatus_alumno=='EGR'){
            return 'EGRESADO';
        }else if($this->est_estatus_alumno=='TIT'){
            return 'EGRESADO TITULADO';
        }

    }
    public function getutilper()
    {
        return $this->hasOne(PeriodosEscolares::className(),['pesc_periodo' => 'est_ultimo_periodo_inscrito']);
    }

      ///obtienes la referencia de datos 
      public static function getInfoEst($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('estudiantes, carreras');
        $query->where('estudiantes.est_carrera=carreras.carr_carrera');
        $query->andWhere('estudiantes.est_no_de_control=:num');
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->all();
        return $raws;
        }
        
        public static function getIndicadores(){
            //recupero variables de sesion
            
            ?>

        <div class="row">
        <br>
        <p><h5>Agrega información para completar tu Curricum Vitae: (Para estar en un nivel optimo, todos los indicadores debe de estar en color Verde)</h5> </p>
            
        
               <?php
            $session = Yii::$app->session; 
            if($session['rol']=="TIT" ||$session['rol']=="EGR" ){
        ?>

        <div class="row">
            <div class="col-lg-11" style="text-align: center;">
                <h5>Encuesta de satisfacción</h5>
                <p></p>
                <?php
                $no_de_control=Yii::$app->session['usuario'];
                $valor=Pertinencia::getPersonalCount($no_de_control);
                $carita1="";
                if($valor==0){
                    $carita1="s1.png";
                }
               /* if($valor==1){
                    $carita1="s2.png";
                }*/
                if($valor>0){
                    $carita1="s3.png";
                }
                ?>
                <?= Html::a(Yii::t('app','<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">'), ['/pertinencia/index'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
            </div>

        </div>
            <?php } ?>
        
        
        
        
            <div class="col-lg-3">
                <h5>Información laboral</h5>
                <p></p>
                <?php
                $valor=0;
                $no_de_control=Yii::$app->session['usuario'];
                $valor=InformacionLaboral::getPersonalCount($no_de_control);
                $carita1="";
                if($valor==0){
                    $carita1="s1.png";
                }
                if($valor==1){
                    $carita1="s2.png";
                }
                if($valor>1){
                    $carita1="s3.png";
                }
                ?>
                <?= Html::a(Yii::t('app','<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">'), ['/informacion-laboral/index'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
            </div>
            <div class="col-lg-3">
                <h5>Perfil</h5>
                <p></p>
                <?php
                $valor=0;
                $no_de_control=Yii::$app->session['usuario'];
                //$valor=PerfilEgresado::getPersonalCount($no_de_control);
                
                 $valor=PerfilEgresado::getPeriodoact($no_de_control);
               
                $carita1="";
                if($valor==0){
                    $carita1="s1.png";
                }
                /*if($valor==1){
                    $carita1="s2.png";
                }*/
                if($valor > 0){
                    $carita1="s3.png";
                }
                ?>
                <?= Html::a(Yii::t('app','<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">'), ['/perfil-egresado/index'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
            </div>
            <div class="col-lg-3">
                <h5>Información académica</h5>
                <p></p>
                <?php
                $valor=0;
                $no_de_control=Yii::$app->session['usuario'];
                $valor=InfAcademica::getPersonalCount($no_de_control);
                $carita1="";
                if($valor==0){
                    $carita1="s1.png";
                }
                if($valor==1){
                    $carita1="s2.png";
                }
                if($valor>1){
                    $carita1="s3.png";
                }
                ?>
                <?= Html::a(Yii::t('app','<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">'), ['/inf-academ/index'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
            </div>

             <div class="col-lg-3">
                <h5>Referencias Profesionales</h5>
                <p></p>
                <?php
                $valor=0;
                $no_de_control=Yii::$app->session['usuario'];
                $valor=RefProfesionales::getProfesionalCount($no_de_control);              
                $carita1="";
                if($valor == 0){
                    $carita1 = "s1.png";
                }
                if($valor == 1){
                    $carita1="s2.png";
                }
                if($valor > 1){
                    $carita1="s3.png";
                }
               
                ?>
                <?= Html::a(Yii::t('app','<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">'), ['/ref-profesionales/index'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
            </div>
        </div>

     
        

        <?php
            
        }


    public static function getIndicadoreseg($no_de_control){
        //recupero variables de sesion

            $es = (new \yii\db\Query())
            ->select("est_estatus_alumno")
            ->from('estudiantes')
            ->where("est_no_de_control='$no_de_control'")
            ->One();

            $est=$es['est_estatus_alumno'];
        ?>

        <div class="row">
            <br>
            <p><h5>Para estar en un nivel optimo, todos los indicadores debe de estar en color Verde</h5> </p>


            <?php
            $session = Yii::$app->session;
            if($est=="TIT" || $est=="EGR" ){
                ?>

                <div class="row">
                    <div class="col-lg-11" style="text-align: center;">
                        <?php

                        //$no_de_control=Yii::$app->session['usuario'];
                        $valor=Pertinencia::getPersonalCount($no_de_control);
                        $carita1=""; ?>

                        <h5>Encuesta de satisfacción(<?= $valor ?>)</h5>
                        <p></p>
                        <?php

                        if($valor==0){
                            $carita1="s1.png";
                        }
                        /* if($valor==1){
                             $carita1="s2.png";
                         }*/
                        if($valor>0){
                            $carita1="s3.png";
                        }
                        ?>
                        <?= '<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">' ?>
                    </div>

                </div>
            <?php } ?>




            <div class="col-lg-3">

                <?php
                $valor=InformacionLaboral::getPersonalCount($no_de_control);
                $carita1="";

                ?>
                <h5>Información laboral(<?= $valor ?>)</h5>
                <p></p>

                <?php
                $valor=0;
                //$no_de_control=Yii::$app->session['usuario'];

                if($valor==0){
                    $carita1="s1.png";
                }
                if($valor==1){
                    $carita1="s2.png";
                }
                if($valor>1){
                    $carita1="s3.png";
                }
                ?>
                <?= '<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">' ?>
            </div>
            <div class="col-lg-3">

                <?php

                $valor=PerfilEgresado::getPeriodoact($no_de_control);

                $carita1="";
                ?>
                <h5>Perfil(<?= $valor ?>)</h5>
                <p></p>

                <?php
                $valor=0;
               // $no_de_control=Yii::$app->session['usuario'];
                //$valor=PerfilEgresado::getPersonalCount($no_de_control);

                if($valor==0){
                    $carita1="s1.png";
                }
                /*if($valor==1){
                    $carita1="s2.png";
                }*/
                if($valor > 0){
                    $carita1="s3.png";
                }
                ?>
                <?= '<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">' ?>
            </div>
            <div class="col-lg-3">
                <?php
                $valor=0;
                // $no_de_control=Yii::$app->session['usuario'];
                $valor=InfAcademica::getPersonalCount($no_de_control);
                $carita1="";
                ?>
                <h5>Información académica(<?= $valor ?>)</h5>
                <p></p>
                <?php



                if($valor==0){
                    $carita1="s1.png";
                }
                if($valor==1){
                    $carita1="s2.png";
                }
                if($valor>1){
                    $carita1="s3.png";
                }
                ?>
                <?= '<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">' ?>
            </div>

            <div class="col-lg-3">
                <?php
                $valor=0;
                // $no_de_control=Yii::$app->session['usuario'];
                $valor=RefProfesionales::getProfesionalCount($no_de_control);
                $carita1="";
                ?>
                <h5>Referencias Profesionales(<?= $valor ?>)</h5>
                <p></p>
                <?php

                if($valor == 0){
                    $carita1 = "s1.png";
                }
                if($valor == 1){
                    $carita1="s2.png";
                }
                if($valor > 1){
                    $carita1="s3.png";
                }

                ?>
                <?= '<img style="width:100px" id="FotoP" src="'. 'images/'.$carita1.'">' ?>
            </div>
        </div>




        <?php

    }

    
   

}

