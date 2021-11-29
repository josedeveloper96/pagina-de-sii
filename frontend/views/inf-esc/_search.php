<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InfEscuelasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inf-escuelas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'infes_id') ?>

    <?= $form->field($model, 'infes_nmbre') ?>

    <?= $form->field($model, 'infes_direccion') ?>

    <?= $form->field($model, 'infes_estado') ?>

    <?= $form->field($model, 'infes_municipio') ?>

    <?php // echo $form->field($model, 'infes_localidad') ?>

    <?php // echo $form->field($model, 'infes_telefono') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
