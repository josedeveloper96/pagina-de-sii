<?php

use app\models\ReferenciasEg;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasEg */

$this->title = 'Crear Referencias: '.$model->reg_no_de_control;

?>
<div class="referencias-eg-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="referencias-eg-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php  //$form->field($model, 'reg_no_de_control')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_email')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'reg_cel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_cel')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '999-999-9999',]) ?>

        <?= $form->field($model, 'reg_facebook')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_linkedin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_instragram')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_twitter')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_skype')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'reg_comentario')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'reg_fecha')->textInput() ?>

        <?php // $form->field($model, 'reg_user_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
