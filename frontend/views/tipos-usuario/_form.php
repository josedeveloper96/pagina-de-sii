<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TiposUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipos-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tus_tipo_usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tus_descripcion_tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tus_pagina_inicial')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
