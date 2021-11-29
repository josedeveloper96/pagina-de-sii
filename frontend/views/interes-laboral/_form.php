<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InteresLaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interes-laboral-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inl_no_de_control')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inl_cuenta_empleo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inl_conseguir_empleo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inl_política_privacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inl_curriculum_plataforma_archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inl_url_curriculum')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
