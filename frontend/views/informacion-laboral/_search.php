<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\informacionLaboralsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informacion-laboral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'inf_lab_id') ?>

    <?= $form->field($model, 'inf_lab_fecha_ing_emp') ?>

    <?= $form->field($model, 'ing_lab_fecha_ter_emp') ?>

    <?= $form->field($model, 'inf_lab_nombre_ji') ?>

    <?= $form->field($model, 'inf_lab_puesto_ji') ?>

    <?php // echo $form->field($model, 'inf_lab_telefono_ji') ?>

    <?php // echo $form->field($model, 'inf_lab_ext_ji') ?>

    <?php // echo $form->field($model, 'inf_lab_email_ji') ?>

    <?php // echo $form->field($model, 'inf_lab_no_de_control') ?>

    <?php // echo $form->field($model, 'inf_lab_empresa_id') ?>

    <?php // echo $form->field($model, 'inf_lab_medio_em_id') ?>

    <?php // echo $form->field($model, 'inf_lab_otro_medio_em') ?>

    <?php // echo $form->field($model, 'inf_lab_requisitos_con_id') ?>

    <?php // echo $form->field($model, 'inf_lab_otro_requisitos_con') ?>

    <?php // echo $form->field($model, 'inf_lab_nivel_jer_id') ?>

    <?php // echo $form->field($model, 'inf_lab_ingreso_salario_id') ?>

    <?php // echo $form->field($model, 'inf_lab_cond_tra_id') ?>

    <?php // echo $form->field($model, 'inf_lab_otro_cond_tra') ?>

    <?php // echo $form->field($model, 'inf_lab_rel_for') ?>

    <?php // echo $form->field($model, 'inf_lab_idiomas_trabajo_id') ?>

    <?php // echo $form->field($model, 'inf_lab_otro_idioma') ?>

    <?php // echo $form->field($model, 'inf_lab_uso_ie_hablar') ?>

    <?php // echo $form->field($model, 'inf_lab_uso_ie_escribir') ?>

    <?php // echo $form->field($model, 'inf_lab_uso_ie_leer') ?>

    <?php // echo $form->field($model, 'inf_lab_uso_ie_escuchar') ?>

    <?php // echo $form->field($model, 'inf_lab_efi_rea_act') ?>

    <?php // echo $form->field($model, 'inf_lab_com_cal_for_aca') ?>

    <?php // echo $form->field($model, 'inf_lab_uti_res_pro') ?>

    <?php // echo $form->field($model, 'inf_lab_are_cam_est') ?>

    <?php // echo $form->field($model, 'inf_lab_titulacion') ?>

    <?php // echo $form->field($model, 'inf_lab_exp_lab') ?>

    <?php // echo $form->field($model, 'inf_lab_com_lab') ?>

    <?php // echo $form->field($model, 'inf_lab_pos_int_egre') ?>

    <?php // echo $form->field($model, 'inf_lab_con_idio_ext') ?>

    <?php // echo $form->field($model, 'inf_lab_rec_ref') ?>

    <?php // echo $form->field($model, 'inf_lab_per_act') ?>

    <?php // echo $form->field($model, 'inf_lab_cap_lid') ?>

    <?php // echo $form->field($model, 'inf_lab_fecha_registro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
