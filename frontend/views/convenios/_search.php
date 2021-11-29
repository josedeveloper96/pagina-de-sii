<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\conveniosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convenios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'con_id') ?>

    <?= $form->field($model, 'con_tipo_convenio_id') ?>

    <?= $form->field($model, 'con_empresa_id') ?>

    <?= $form->field($model, 'con_fecha_inicio') ?>

    <?= $form->field($model, 'con_fecha_termino') ?>

    <?php // echo $form->field($model, 'con_url') ?>

    <?php // echo $form->field($model, 'con_estado_convenio_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
