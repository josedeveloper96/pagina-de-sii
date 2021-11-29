<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\TiposUsuario;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    
    <?= $form->field($model, 'email')->textInput() ?>
    

    <?= $form->field($model, 'status')->radioList( ['2'=>'Activo', '1' => 'Inactivo', '0' => 'Eliminado'], ['unselect' => null] ) ?>
    
    
    <?= $form->field($model, 'role')->dropDownlist(ArrayHelper::map(TiposUsuario::find()->all(),'tus_tipo_usuario','tus_descripcion_tipo'),['prompt'=>'Seleccione...']) ?>

    
    <?= $form->field($model, 'password')->passwordInput() ?>
    
   
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
