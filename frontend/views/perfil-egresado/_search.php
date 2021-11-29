<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\PerfilEgresadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-egresado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_egr_id') ?>

    <?= $form->field($model, 'per_egr_calle') ?>

    <?= $form->field($model, 'per_egr_no') ?>

    <?= $form->field($model, 'per_egr_colonia') ?>

    <?= $form->field($model, 'per_egr_cp') ?>

    <?php // echo $form->field($model, 'per_egr_municipio_id') ?>

    <?php // echo $form->field($model, 'per_egr_estado_id') ?>

    <?php // echo $form->field($model, 'per_egr_localidad_id') ?>

    <?php // echo $form->field($model, 'per_egr_tel_cel') ?>

    <?php // echo $form->field($model, 'per_egr_tel_casa') ?>

    <?php // echo $form->field($model, 'per_egr_email') ?>

    <?php // echo $form->field($model, 'per_egr_est_civil') ?>

    <?php // echo $form->field($model, 'per_egr_ingles') ?>

    <?php // echo $form->field($model, 'per_egr_paq_com') ?>

    <?php // echo $form->field($model, 'per_egr_fecha') ?>

    <?php // echo $form->field($model, 'per_no_de_control') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
