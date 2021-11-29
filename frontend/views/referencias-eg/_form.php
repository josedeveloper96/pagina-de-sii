<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasEg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referencias-eg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reg_no_de_control')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_cel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_linkedin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_instragram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_twitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_comentario')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'reg_fecha')->textInput() ?>

    <?= $form->field($model, 'reg_user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
