<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InfAcademicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inf-academica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'infac_id') ?>

    <?= $form->field($model, 'infac_escuela_id') ?>

    <?= $form->field($model, 'infac_tipo') ?>

    <?= $form->field($model, 'infac_disiplina') ?>

    <?= $form->field($model, 'infac_promedio') ?>

    <?php // echo $form->field($model, 'infac_registro') ?>

    <?php // echo $form->field($model, 'infac_fechini') ?>

    <?php // echo $form->field($model, 'infac_fechfin') ?>

    <?php // echo $form->field($model, 'infac_no_de_control') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
