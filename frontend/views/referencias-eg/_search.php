<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasEgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referencias-eg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'reg_id') ?>

    <?= $form->field($model, 'reg_no_de_control') ?>

    <?= $form->field($model, 'reg_email') ?>

    <?= $form->field($model, 'reg_cel') ?>

    <?= $form->field($model, 'reg_facebook') ?>

    <?php // echo $form->field($model, 'reg_linkedin') ?>

    <?php // echo $form->field($model, 'reg_instragram') ?>

    <?php // echo $form->field($model, 'reg_twitter') ?>

    <?php // echo $form->field($model, 'reg_skype') ?>

    <?php // echo $form->field($model, 'reg_comentario') ?>

    <?php // echo $form->field($model, 'reg_fecha') ?>

    <?php // echo $form->field($model, 'reg_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
