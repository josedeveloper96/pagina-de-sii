<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TiposUsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipos-usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tus_tipo_usuario') ?>

    <?= $form->field($model, 'tus_descripcion_tipo') ?>

    <?= $form->field($model, 'tus_pagina_inicial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
