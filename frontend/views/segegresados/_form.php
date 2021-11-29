<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'est_no_de_control')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_carrera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_reticula')->textInput() ?>

    <?= $form->field($model, 'est_nivel_escolar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_especialidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_semestre')->textInput() ?>

    <?= $form->field($model, 'est_clave_interna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_estatus_alumno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_plan_de_estudios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_nombre_alumno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_curp_alumno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'est_sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_estado_civil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_tipo_ingreso')->textInput() ?>

    <?= $form->field($model, 'est_periodo_ingreso_it')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_ultimo_periodo_inscrito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_promedio_periodo_anterior')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_promedio_aritmetico_acumulado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_creditos_aprobados')->textInput() ?>

    <?= $form->field($model, 'est_creditos_cursados')->textInput() ?>

    <?= $form->field($model, 'est_promedio_final_alcanzado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_tipo_servicio_medico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_clave_servicio_medico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_escuela_procedencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_tipo_escuela')->textInput() ?>

    <?= $form->field($model, 'est_domicilio_escuela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_entidad_procedencia')->textInput() ?>

    <?= $form->field($model, 'est_ciudad_procedencia')->textInput() ?>

    <?= $form->field($model, 'est_correo_electronico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_firma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_periodos_revalidacion')->textInput() ?>

    <?= $form->field($model, 'est_indice_reprobacion_acumulado')->textInput() ?>

    <?= $form->field($model, 'est_becado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_nip')->textInput() ?>

    <?= $form->field($model, 'est_tipo_alumno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_nacionalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_fecha_actualizacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
