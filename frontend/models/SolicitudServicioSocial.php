<?php

namespace frontend\models;


use Yii;
use common\models\Empresas;
use yii\helpers\ArrayHelper;
use frontend\models\ModalidadesSs;
use frontend\models\TipoProgramasSs;

/**
 * This is the model class for table "solicitud_servicio_social".
 *
 * @property int $ss_id
 * @property string $ss_no_de_control
 * @property int $ss_empresa_id
 * @property string $ss_nombre_programa
 * @property int $ss_modalidad_id
 * @property string $ss_fecha_inicio
 * @property string $ss_fecha_termino
 * @property string $ss_actividades_resumidas
 * @property int $ss_tipo_programa_id
 * @property string $ss_otro_tipo_programa
 * @property string $ss_aceptado
 * @property string $ss_observaciones_sol
 * @property string $ss_responsable_programa
 * @property string $ss_area_responsable_programa
 * @property string $ss_puesto_responsable_programa
 * @property string $ss_justificiacion_programa
 * @property string $ss_objetivos_programa
 * @property string $ss_funciones_progrma
 * @property string $ss_actividades_detalladas_programa
 * @property int $ss_observaciones_programa
 */
class SolicitudServicioSocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solicitud_servicio_social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ss_empresa_id', 'ss_modalidad_id', 'ss_tipo_programa_id', 'ss_observaciones_programa'], 'integer'],
            [['ss_empresa_id', 'ss_modalidad_id', 'ss_tipo_programa_id','ss_nombre_programa', 'ss_otro_tipo_programa', 'ss_area_responsable_programa', 'ss_puesto_responsable_programa','ss_fecha_inicio', 'ss_fecha_termino','ss_actividades_resumidas','ss_observaciones_sol', 'ss_justificiacion_programa', 'ss_objetivos_programa', 'ss_funciones_progrma', 'ss_actividades_detalladas_programa','ss_responsable_programa' ], 'required'],
            [['ss_fecha_inicio', 'ss_fecha_termino'], 'safe'],
            [['ss_no_de_control'], 'string', 'max' => 10],
            [['ss_nombre_programa', 'ss_otro_tipo_programa', 'ss_area_responsable_programa', 'ss_puesto_responsable_programa'], 'string', 'max' => 100],
            [['ss_actividades_resumidas'], 'string', 'max' => 300],
            [['ss_aceptado'], 'string', 'max' => 1],
            [['ss_observaciones_sol', 'ss_justificiacion_programa', 'ss_objetivos_programa', 'ss_funciones_progrma', 'ss_actividades_detalladas_programa'], 'string', 'max' => 500],
            [['ss_responsable_programa'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ss_id' => 'Ss ID',
            'ss_no_de_control' => 'Ss No De Control',
            'ss_empresa_id' => 'Empresa donde se realizará el Servicio Social',
            'ss_nombre_programa' => 'Nombre Programa',
            'ss_modalidad_id' => 'Modalidad',
            'ss_fecha_inicio' => 'Fecha Inicio',
            'ss_fecha_termino' => 'Fecha Termino',
            'ss_actividades_resumidas' => 'Actividades Resumidas',
            'ss_tipo_programa_id' => 'Tipo Programa',
            'ss_otro_tipo_programa' => 'Otro Tipo Programa',
            'ss_aceptado' => 'Aceptado',
            'ss_observaciones_sol' => 'Observaciones del Solicitud',
            'ss_responsable_programa' => 'Responsable del Programa',
            'ss_area_responsable_programa' => 'Area Responsable del  Programa',
            'ss_puesto_responsable_programa' => 'Puesto Responsable del Programa',
            'ss_justificiacion_programa' => 'Justificiacion del Programa',
            'ss_objetivos_programa' => 'Objetivos del Programa',
            'ss_funciones_progrma' => 'Funciones del Progrma',
            'ss_actividades_detalladas_programa' => 'Actividades Detalladas del Programa',
            'ss_observaciones_programa' => 'Observaciones del Programa',
        ];
    }

    public static function getEmpresaLista()
    {
        $dropciones = Empresas::find()->asArray()->all();
        return ArrayHelper::map($dropciones, 'emp_id', 'emp_razon_social');
    }

    public static function getModalidadesLista()
    {
        $dropciones = ModalidadesSs::find()->asArray()->all();
        return ArrayHelper::map($dropciones, 'mod_id', 'mod_nombre');
    }

    public static function getTiposLista()
    {
        $dropciones = TipoProgramasSs::find()->asArray()->all();
        return ArrayHelper::map($dropciones, 'tip_id', 'tip_nombre');
    }
}
