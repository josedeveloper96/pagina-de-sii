<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudEstServicioSocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-servicio-social-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ss_id') ?>

    <?= $form->field($model, 'ss_no_de_control') ?>

    <?= $form->field($model, 'ss_empresa_id') ?>

    <?= $form->field($model, 'ss_nombre_programa') ?>

    <?= $form->field($model, 'ss_modalidad_id') ?>

    <?php // echo $form->field($model, 'ss_fecha_inicio') ?>

    <?php // echo $form->field($model, 'ss_fecha_termino') ?>

    <?php // echo $form->field($model, 'ss_actividades_resumidas') ?>

    <?php // echo $form->field($model, 'ss_tipo_programa_id') ?>

    <?php // echo $form->field($model, 'ss_otro_tipo_programa') ?>

    <?php // echo $form->field($model, 'ss_aceptado') ?>

    <?php // echo $form->field($model, 'ss_observaciones_sol') ?>

    <?php // echo $form->field($model, 'ss_responsable_programa') ?>

    <?php // echo $form->field($model, 'ss_area_responsable_programa') ?>

    <?php // echo $form->field($model, 'ss_puesto_responsable_programa') ?>

    <?php // echo $form->field($model, 'ss_justificiacion_programa') ?>

    <?php // echo $form->field($model, 'ss_objetivos_programa') ?>

    <?php // echo $form->field($model, 'ss_funciones_progrma') ?>

    <?php // echo $form->field($model, 'ss_actividades_detalladas_programa') ?>

    <?php // echo $form->field($model, 'ss_observaciones_programa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
