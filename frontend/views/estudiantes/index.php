<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\estudiantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'est_no_de_control',
            'est_carrera:ntext',
            'est_reticula',
            'est_nivel_escolar',
            'est_especialidad',
            //'est_semestre',
            //'est_clave_interna',
            //'est_estatus_alumno',
            //'est_plan_de_estudios',
            //'est_apellido_paterno',
            //'est_apellido_materno',
            //'est_nombre_alumno',
            //'est_curp_alumno',
            //'est_fecha_nacimiento',
            //'est_sexo',
            //'est_estado_civil',
            //'est_tipo_ingreso',
            //'est_periodo_ingreso_it',
            //'est_ultimo_periodo_inscrito',
            //'est_promedio_periodo_anterior',
            //'est_promedio_aritmetico_acumulado',
            //'est_creditos_aprobados',
            //'est_creditos_cursados',
            //'est_promedio_final_alcanzado',
            //'est_tipo_servicio_medico',
            //'est_clave_servicio_medico',
            //'est_escuela_procedencia',
            //'est_tipo_escuela',
            //'est_domicilio_escuela',
            //'est_entidad_procedencia',
            //'est_ciudad_procedencia',
            //'est_correo_electronico',
            //'est_foto',
            //'est_firma',
            //'est_periodo_revalidacion',
            //'est_indice_reprobacion_acumulado',
            //'est_becado_por',
            //'est_nip',
            //'est_tipo_alumno',
            //'est_nacionalidad',
            //'est_usuario',
            //'est_fecha_actualizacion',

            ['class' => ActionColumn::className(),'template'=>'{view} {update}'],
        ],
    ]); ?>
</div>
