<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PertinenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pertinencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_no_de_control') ?>

    <?= $form->field($model, 'per_cal_doc') ?>

    <?= $form->field($model, 'per_plan_es') ?>

    <?= $form->field($model, 'per_opr_part') ?>

    <?= $form->field($model, 'per_enf_inv') ?>

    <?php // echo $form->field($model, 'per_sat_con') ?>

    <?php // echo $form->field($model, 'per_exp_obt') ?>

    <?php // echo $form->field($model, 'per_tiempo_tran_prim_emp_id') ?>

    <?php // echo $form->field($model, 'per_fecha_registro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
