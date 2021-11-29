<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EmpresasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'emp_id') ?>

    <?= $form->field($model, 'emp_organismo') ?>

    <?= $form->field($model, 'emp_giro') ?>

    <?= $form->field($model, 'emp_razon_social') ?>

    <?= $form->field($model, 'emp_calle') ?>

    <?php // echo $form->field($model, 'emp_numero') ?>

    <?php // echo $form->field($model, 'emp_colonia') ?>

    <?php // echo $form->field($model, 'emp_cp') ?>

    <?php // echo $form->field($model, 'emp_localidad_id') ?>

    <?php // echo $form->field($model, 'emp_municipio_id') ?>

    <?php // echo $form->field($model, 'emp_estado_id') ?>

    <?php // echo $form->field($model, 'emp_tel') ?>

    <?php // echo $form->field($model, 'emp_ext_tel') ?>

    <?php // echo $form->field($model, 'emp_email') ?>

    <?php // echo $form->field($model, 'emp_web') ?>

    <?php // echo $form->field($model, 'emp_sec_eco_emp_org_id') ?>

    <?php // echo $form->field($model, 'emp_tamano_emp_id') ?>

    <?php // echo $form->field($model, 'emp_comentarios') ?>

    <?php // echo $form->field($model, 'emp_fecha_reg') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
