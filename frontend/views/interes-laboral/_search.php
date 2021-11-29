<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InteresLaboralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interes-laboral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'inl_id') ?>

    <?= $form->field($model, 'inl_no_de_control') ?>

    <?= $form->field($model, 'inl_cuenta_empleo') ?>

    <?= $form->field($model, 'inl_conseguir_empleo') ?>

    <?= $form->field($model, 'inl_política_privacidad') ?>

    <?php // echo $form->field($model, 'inl_curriculum_plataforma_archivo') ?>

    <?php // echo $form->field($model, 'inl_url_curriculum') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
