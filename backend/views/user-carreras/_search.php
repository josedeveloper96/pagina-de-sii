<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserCarrerasEgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-carreras-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usc_id') ?>

    <?= $form->field($model, 'usc_user_id') ?>

    <?= $form->field($model, 'usc_carrera') ?>

    <?= $form->field($model, 'usc_reticula') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
