<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CorreosEstudiantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correos-estudiantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ce_id') ?>

  

    <?= $form->field($model, 'ce_asunto') ?>

    <?= $form->field($model, 'ce_contenido') ?>

    <?= $form->field($model, 'ce_carrera') ?>

    <?php // echo $form->field($model, 'ce_no_de_control') ?>

    <?php // echo $form->field($model, 'ce_cesemestre_min') ?>

    <?php // echo $form->field($model, 'ce_semestre_max') ?>

    <?php // echo $form->field($model, 'ce_creditos_min') ?>

    <?php // echo $form->field($model, 'ce_creditos_max') ?>

    <?php // echo $form->field($model, 'ce_promedio_min') ?>

    <?php // echo $form->field($model, 'ce_promedio_max') ?>

    <?php // echo $form->field($model, 'ce_tipo_estudiante') ?>

    <?php // echo $form->field($model, 'ce_incluir_usycon') ?>

    <?php // echo $form->field($model, 'ce_fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
