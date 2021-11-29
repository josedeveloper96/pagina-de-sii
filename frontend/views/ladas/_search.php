<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LadasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ladas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iso') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nicename') ?>

    <?= $form->field($model, 'iso3') ?>

    <?php // echo $form->field($model, 'numcode') ?>

    <?php // echo $form->field($model, 'phonecode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
