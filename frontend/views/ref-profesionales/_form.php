<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\RefProfesionales */
use common\models\Ladas;
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-profesionales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ref_no_de_control')->hiddenInput(['value'=>Yii::$app->session['usuario']])->label(false) ?>

    <?= $form->field($model, 'ref_nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_no_cel')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(999)-999-9999',])  ?>

    <?= $form->field($model, 'ref_ocupacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
