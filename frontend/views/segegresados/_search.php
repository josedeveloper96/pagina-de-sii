<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SegestudiantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'est_no_de_control') ?>

    <?= $form->field($model, 'est_carrera') ?>

    <?= $form->field($model, 'est_reticula') ?>

    <?= $form->field($model, 'est_nivel_escolar') ?>

    <?= $form->field($model, 'est_especialidad') ?>

    <?php // echo $form->field($model, 'est_semestre') ?>

    <?php // echo $form->field($model, 'est_clave_interna') ?>

    <?php // echo $form->field($model, 'est_estatus_alumno') ?>

    <?php // echo $form->field($model, 'est_plan_de_estudios') ?>

    <?php // echo $form->field($model, 'est_apellido_paterno') ?>

    <?php // echo $form->field($model, 'est_apellido_materno') ?>

    <?php // echo $form->field($model, 'est_nombre_alumno') ?>

    <?php // echo $form->field($model, 'est_curp_alumno') ?>

    <?php // echo $form->field($model, 'est_fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'est_sexo') ?>

    <?php // echo $form->field($model, 'est_estado_civil') ?>

    <?php // echo $form->field($model, 'est_tipo_ingreso') ?>

    <?php // echo $form->field($model, 'est_periodo_ingreso_it') ?>

    <?php // echo $form->field($model, 'est_ultimo_periodo_inscrito') ?>

    <?php // echo $form->field($model, 'est_promedio_periodo_anterior') ?>

    <?php // echo $form->field($model, 'est_promedio_aritmetico_acumulado') ?>

    <?php // echo $form->field($model, 'est_creditos_aprobados') ?>

    <?php // echo $form->field($model, 'est_creditos_cursados') ?>

    <?php // echo $form->field($model, 'est_promedio_final_alcanzado') ?>

    <?php // echo $form->field($model, 'est_tipo_servicio_medico') ?>

    <?php // echo $form->field($model, 'est_clave_servicio_medico') ?>

    <?php // echo $form->field($model, 'est_escuela_procedencia') ?>

    <?php // echo $form->field($model, 'est_tipo_escuela') ?>

    <?php // echo $form->field($model, 'est_domicilio_escuela') ?>

    <?php // echo $form->field($model, 'est_entidad_procedencia') ?>

    <?php // echo $form->field($model, 'est_ciudad_procedencia') ?>

    <?php // echo $form->field($model, 'est_correo_electronico') ?>

    <?php // echo $form->field($model, 'est_foto') ?>

    <?php // echo $form->field($model, 'est_firma') ?>

    <?php // echo $form->field($model, 'est_periodos_revalidacion') ?>

    <?php // echo $form->field($model, 'est_indice_reprobacion_acumulado') ?>

    <?php // echo $form->field($model, 'est_becado_por') ?>

    <?php // echo $form->field($model, 'est_nip') ?>

    <?php // echo $form->field($model, 'est_tipo_alumno') ?>

    <?php // echo $form->field($model, 'est_nacionalidad') ?>

    <?php // echo $form->field($model, 'est_usuario') ?>

    <?php // echo $form->field($model, 'est_fecha_actualizacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
