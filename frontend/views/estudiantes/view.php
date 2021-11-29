<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiantes */

$this->title = $model->est_nombre_alumno.' '.$model->est_apellido_paterno.' '.$model->est_apellido_materno;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar Información', ['update', 'id' => $model->est_no_de_control], ['class' => 'btn btn-primary']) ?>
  
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'est_no_de_control',
            'est_carrera',
            'est_reticula',
            'est_nivel_escolar',
            'est_especialidad',
            'est_semestre',
           // 'est_clave_interna',
           // 'est_estatus_alumno',
           // 'est_plan_de_estudios',
            'est_apellido_paterno',
            'est_apellido_materno',
            'est_nombre_alumno',
            'est_curp_alumno',
            'est_fecha_nacimiento',
            'est_sexo',
            'est_estado_civil',
           // 'est_tipo_ingreso',
           // 'est_periodo_ingreso_it',
           // 'est_ultimo_periodo_inscrito',
           // 'est_promedio_periodo_anterior',
            'est_promedio_aritmetico_acumulado',
           // 'est_creditos_aprobados',
           // 'est_creditos_cursados',
           // 'est_promedio_final_alcanzado',
           // 'est_tipo_servicio_medico',
           // 'est_clave_servicio_medico',
           // 'est_escuela_procedencia',
           // 'est_tipo_escuela',
           // 'est_domicilio_escuela',
           // 'est_entidad_procedencia',
            'est_ciudad_procedencia',
            'est_correo_electronico',
            
            
//                         [
//                     'attribute' => 'Imagen',
//                     'format' => 'raw',
//                     'value' => function ($model) {   
//                        if ($model->est_foto!=''){
//                            $img = Url::to('@web/uploads/estudiantes/').$img_obj['AVATAR'];
//                            return Html::img('@web/img/icon.png', ['class' => 'pull-left img-responsive']);
//                        return '<img src="'.$model->est_foto.'" width="80px" height="auto">';
//                        
//                        } else return 'no image';
//                     },
//                   ]
//                   camio
//[
//            'attribute'=>'photo',
//            'value' =>  Html::a(Html::img(Yii::getAlias('@web').'/uploads/estudiantes/'.$model->est_foto, ['alt'=>'some', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']), ['site/zoom']),
//            'format' => ['raw'],
//        ]            
            'est_foto',
           // 'est_firma',
           // 'est_periodo_revalidacion',
           // 'est_indice_reprobacion_acumulado',
           // 'est_becado_por',
            'est_nip',
           // 'est_tipo_alumno',
            'est_nacionalidad',
           // 'est_usuario',
            'est_fecha_actualizacion',
        ],
    ]) ?>

</div>
