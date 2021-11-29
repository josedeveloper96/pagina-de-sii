<?php

namespace common\models;

use Yii;

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
 *
 * @property Carreras $estCarrera
 * @property RepetitivasEgresados[] $repetitivasEgresados
 */
class Estudiantes2 extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['est_no_de_control'], 'required'],
            [['est_reticula', 'est_semestre', 'est_tipo_ingreso', 'est_creditos_aprobados', 'est_creditos_cursados', 'est_tipo_escuela', 'est_entidad_procedencia', 'est_ciudad_procedencia', 'est_periodo_revalidacion', 'est_indice_reprobacion_acumulado', 'est_nip'], 'integer'],
            [['est_fecha_nacimiento', 'est_fecha_actualizacion'], 'safe'],
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
            [['est_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::className(), 'targetAttribute' => ['est_carrera' => 'carr_carrera']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstCarrera()
    {
        return $this->hasOne(Carreras::className(), ['carr_carrera' => 'est_carrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepetitivasEgresados()
    {
        return $this->hasMany(RepetitivasEgresados::className(), ['rep_egr_no_de_control' => 'est_no_de_control']);
    }
}
