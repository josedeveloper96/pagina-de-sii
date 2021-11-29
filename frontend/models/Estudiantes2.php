<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "estudiantes".
 *
 * @property string $est_no_de_control
 * @property string $est_carrera
 * @property int $est_reticula
 * @property string $est_nive_escolar
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
 * @property int $est_periodo_revalidacion
 * @property int $est_indice_reprobacion_acumulado
 * @property string $est_becado_por
 * @property int $est_nip
 * @property string $est_tipo_alumno
 * @property string $est_nacionalidad
 * @property string $est_usuario
 * @property string $est_fecha_actualizacion
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
                ->andWhere(['or',['est_estatus_alumno'=>'EGR'],['est_estatus_alumno'=>'TIT']])->one();
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
            [['est_reticula', 'est_semestre', 'est_tipo_ingreso', 'est_creditos_aprobados', 'est_creditos_cursados', 'est_tipo_escuela', 'est_entidad_procedencia', 'est_ciudad_procedencia', 'est_periodo_revalidacion', 'est_indice_reprobacion_acumulado', 'est_nip'], 'integer'],
            [['est_fecha_nacimiento', 'est_fecha_actualizacion','est_foto'], 'safe'],
            [['est_promedio_periodo_anterior', 'est_promedio_aritmetico_acumulado', 'est_promedio_final_alcanzado'], 'number'],
            [['est_no_de_control', 'est_clave_interna'], 'string', 'max' => 10],
            [['est_carrera', 'est_estatus_alumno', 'est_nacionalidad', 'est_usuario'], 'string', 'max' => 3],
            [['est_nive_escolar', 'est_plan_de_estudios', 'est_sexo', 'est_estado_civil', 'est_tipo_servicio_medico'], 'string', 'max' => 1],
            [['est_especialidad', 'est_periodo_ingreso_it', 'est_ultimo_periodo_inscrito'], 'string', 'max' => 5],
            [['est_apellido_paterno', 'est_apellido_materno'], 'string', 'max' => 45],
            [['est_nombre_alumno', 'est_foto', 'est_firma', 'est_becado_por'], 'string', 'max' => 100],
            [['est_curp_alumno'], 'string', 'max' => 18],
            [['est_clave_servicio_medico'], 'string', 'max' => 20],
            [['est_escuela_procedencia'], 'string', 'max' => 50],
            [['est_domicilio_escuela'], 'string', 'max' => 60],
            [['est_correo_electronico'], 'string', 'max' => 200],
            [['est_tipo_alumno'], 'string', 'max' => 2],
            [['est_no_de_control'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'est_no_de_control' => 'Est No De Control',
            'est_carrera' => 'Est Carrera',
            'est_reticula' => 'Est Reticula',
            'est_nive_escolar' => 'Est Nive Escolar',
            'est_especialidad' => 'Est Especialidad',
            'est_semestre' => 'Est Semestre',
            'est_clave_interna' => 'Est Clave Interna',
            'est_estatus_alumno' => 'Est Estatus Alumno',
            'est_plan_de_estudios' => 'Est Plan De Estudios',
            'est_apellido_paterno' => 'Est Apellido Paterno',
            'est_apellido_materno' => 'Est Apellido Materno',
            'est_nombre_alumno' => 'Est Nombre Alumno',
            'est_curp_alumno' => 'Est Curp Alumno',
            'est_fecha_nacimiento' => 'Est Fecha Nacimiento',
            'est_sexo' => 'Est Sexo',
            'est_estado_civil' => 'Est Estado Civil',
            'est_tipo_ingreso' => 'Est Tipo Ingreso',
            'est_periodo_ingreso_it' => 'Est Periodo Ingreso It',
            'est_ultimo_periodo_inscrito' => 'Est Ultimo Periodo Inscrito',
            'est_promedio_periodo_anterior' => 'Est Promedio Periodo Anterior',
            'est_promedio_aritmetico_acumulado' => 'Est Promedio Aritmetico Acumulado',
            'est_creditos_aprobados' => 'Est Creditos Aprobados',
            'est_creditos_cursados' => 'Est Creditos Cursados',
            'est_promedio_final_alcanzado' => 'Est Promedio Final Alcanzado',
            'est_tipo_servicio_medico' => 'Est Tipo Servicio Medico',
            'est_clave_servicio_medico' => 'Est Clave Servicio Medico',
            'est_escuela_procedencia' => 'Est Escuela Procedencia',
            'est_tipo_escuela' => 'Est Tipo Escuela',
            'est_domicilio_escuela' => 'Est Domicilio Escuela',
            'est_entidad_procedencia' => 'Est Entidad Procedencia',
            'est_ciudad_procedencia' => 'Est Ciudad Procedencia',
            'est_correo_electronico' => 'Est Correo Electronico',
            'est_foto' => 'Est Foto',
            'est_firma' => 'Est Firma',
            'est_periodo_revalidacion' => 'Est Periodo Revalidacion',
            'est_indice_reprobacion_acumulado' => 'Est Indice Reprobacion Acumulado',
            'est_becado_por' => 'Est Becado Por',
            'est_nip' => 'Est Nip',
            'est_tipo_alumno' => 'Est Tipo Alumno',
            'est_nacionalidad' => 'Est Nacionalidad',
            'est_usuario' => 'Est Usuario',
            'est_fecha_actualizacion' => 'Est Fecha Actualizacion',
        ];
    }
    /*********************************************************************/

}
