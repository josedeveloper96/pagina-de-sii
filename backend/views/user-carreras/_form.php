<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserCarreras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-carreras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usc_user_id')->textInput() ?>

    <?= $form->field($model, 'usc_carrera')->dropDownlist(ArrayHelper::map(\common\models\Carreras::listCarr(),'carr_carrera','carr_nombre_carrera'),['prompt'=>'Seleccione...']) ?>

    <?php // $form->field($model, 'usc_reticula')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
