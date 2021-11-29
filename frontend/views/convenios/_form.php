<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\convenios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convenios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'con_tipo_convenio_id')->textInput() ?>

    <?= $form->field($model, 'con_empresa_id')->textInput() ?>

    <?= $form->field($model, 'con_fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'con_fecha_termino')->textInput() ?>

    <?= $form->field($model, 'con_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'con_estado_convenio_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
