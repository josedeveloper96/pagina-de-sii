<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\RepetitivasEgresadosSearch2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repetitivas-egresados2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rep_egr_id') ?>

    <?= $form->field($model, 'rep_egr_cur_act') ?>

    <?= $form->field($model, 'rep_egr_posgrado') ?>

    <?= $form->field($model, 'rep_egr_cur_act_cuales') ?>

    <?= $form->field($model, 'rep_egr_posgrado_cual') ?>

    <?php // echo $form->field($model, 'rep_egr_per_aso_egr') ?>

    <?php // echo $form->field($model, 'rep_egr_com_y_sug') ?>

    <?php // echo $form->field($model, 'rep_egr_act_dedica') ?>

    <?php // echo $form->field($model, 'rep_egr_estudia') ?>

    <?php // echo $form->field($model, 'rep_egr_est_otro') ?>

    <?php // echo $form->field($model, 'rep_egr_esp_ins') ?>

    <?php // echo $form->field($model, 'rep_egr_per_org_soc') ?>

    <?php // echo $form->field($model, 'rep_egr_per_org_soc_cuales') ?>

    <?php // echo $form->field($model, 'rep_egr_per_org_prof') ?>

    <?php // echo $form->field($model, 'rep_egr_per_org_prof_cuales') ?>

    <?php // echo $form->field($model, 'rep_egr_no_de_control') ?>

    <?php // echo $form->field($model, 'rep_egr_fecha_reg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
