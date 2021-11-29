<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudServicioSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-servicio-social-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ss_empresa_id')->dropDownList($model->empresaLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>


    <?= $form->field($model, 'ss_nombre_programa')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'ss_modalidad_id')->dropDownList($model->modalidadesLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>

    <?= $form->field($model, 'ss_fecha_inicio')->widget(DatePicker::classname(),['language'=>'es','dateFormat'=>'yyyy-MM-dd' ])->textInput() ?>


    <?= $form->field($model, 'ss_fecha_termino')->widget(DatePicker::classname(),['language'=>'es','dateFormat'=>'yyyy-MM-dd' ])->textInput() ?>




    <?= $form->field($model, 'ss_actividades_resumidas')->textArea(['rows' => '3']) ?>

    <?= $form->field($model, 'ss_tipo_programa_id')->dropDownList($model->tiposLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>


    <?= $form->field($model, 'ss_otro_tipo_programa')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'ss_responsable_programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ss_area_responsable_programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ss_puesto_responsable_programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ss_justificiacion_programa')->textArea(['rows' => '3']) ?>

    <?= $form->field($model, 'ss_objetivos_programa')->textArea(['rows' => '3']) ?>

    <?= $form->field($model, 'ss_funciones_progrma')->textArea(['rows' => '3']) ?>

    <?= $form->field($model, 'ss_actividades_detalladas_programa')->textArea(['rows' => '3']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
