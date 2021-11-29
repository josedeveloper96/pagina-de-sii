<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//para cargar fotos
use app\assets\StatusAsset;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Estudiantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'est_estado_civil')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'est_entidad_procedencia')->textInput() ?>

    <?= $form->field($model, 'est_ciudad_procedencia')->textInput() ?>

    <?= $form->field($model, 'est_correo_electronico')->textInput(['maxlength' => true]) ?>
<!--
    <?php// $form->field($model, 'est_foto')->textInput(['maxlength' => true]) ?>
    -->
    <?php
    echo $form->field($model, 'est_foto')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/'], // is 'jpg,jpeg,gif,png' from configuration
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
            'showUpload' => false,
                ],
]);

    ?>
    <?php
//    $form->field($model, 'est_foto')->widget(FileInput::classname(), [
//              'options' => ['accept' => 'image/*'],
//               'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
//               'showUpload' => false,
//                'initialPreview'=> [
//                '<img src="'.$model->est_foto.'" class="file-preview-image">',
//            ],],
//          ]); 
    ?>

    <?= $form->field($model, 'est_firma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_nip')->textInput() ?>

   
    <?= $form->field($model, 'est_nacionalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_fecha_actualizacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
