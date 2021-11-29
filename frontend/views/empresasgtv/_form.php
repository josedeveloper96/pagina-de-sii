<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Empresas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_organismo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_giro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emp_razon_social')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emp_calle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emp_numero')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emp_colonia')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emp_cp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_localidad_id')->textInput() ?>

    <?= $form->field($model, 'emp_municipio_id')->textInput() ?>

    <?= $form->field($model, 'emp_estado_id')->textInput() ?>

    <?= $form->field($model, 'emp_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_ext_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_web')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_sec_eco_emp_org_id')->textInput() ?>

    <?= $form->field($model, 'emp_tamano_emp_id')->textInput() ?>

    <?= $form->field($model, 'emp_comentarios')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emp_fecha_reg')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
