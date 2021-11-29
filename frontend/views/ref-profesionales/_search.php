<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RefProfesionalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-profesionales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref_id') ?>

    <?= $form->field($model, 'ref_no_de_control') ?>

    <?= $form->field($model, 'ref_nombres') ?>

    <?= $form->field($model, 'ref_email') ?>

    <?= $form->field($model, 'ref_no_cel') ?>

    <?php // echo $form->field($model, 'ref_ocupacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
