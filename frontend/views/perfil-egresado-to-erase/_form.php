<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilEgresado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-egresado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_egr_calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_cp')->textInput() ?>

    <?= $form->field($model, 'per_egr_municipio_id')->textInput() ?>

    <?= $form->field($model, 'per_egr_estado_id')->textInput() ?>

    <?= $form->field($model, 'per_egr_localidad_id')->textInput() ?>

    <?= $form->field($model, 'per_egr_tel_cel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_tel_casa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_est_civil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_ingles')->textInput() ?>

    <?= $form->field($model, 'per_egr_paq_com')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'per_egr_fecha')->textInput() ?>

    <?= $form->field($model, 'per_no_de_control')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_img_scr_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_image_web_filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
