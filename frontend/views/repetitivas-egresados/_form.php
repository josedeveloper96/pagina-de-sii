<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\RepetitivasEgresados */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="repetitivas-egresados-form">
 <?php
    $listact = [0 => 'Trabaja', 1 => 'Estudia', 2 => 'Trabaja y estudia', 3 => 'No trabaja ni estudia'];
    $listestudia = [0 => 'Especialidad', 1 => 'Maestría', 2 => 'Doctorado', 3 => 'Idiomas',4 => 'Otro'];
    $listSino=[0 =>'Sí',1 =>'No'];
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rep_egr_no_de_control')->hiddenInput(['maxlength' => true,'value' =>Yii::$app->session['usuario']])->label(false) ?>

    <?= $form->field($model, 'rep_egr_act_dedica')->radioList($listact)  ?>

    <?= $form->field($model, 'rep_egr_estudia')->radioList($listestudia)  ?>

    <?= $form->field($model, 'rep_egr_est_otro')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'rep_egr_esp_ins')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'rep_egr_cur_act')->radioList($listSino) ?>

    <?= $form->field($model, 'rep_egr_cur_act_cuales')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'rep_egr_posgrado')->radioList($listSino) ?>

    <?= $form->field($model, 'rep_egr_posgrado_cual')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'rep_egr_per_org_soc')->radioList($listSino)?>

    <?= $form->field($model, 'rep_egr_per_org_soc_cuales')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'rep_egr_per_org_prof')->radioList($listSino) ?>

    <?= $form->field($model, 'rep_egr_per_org_prof_cuales')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'rep_egr_per_aso_egr')->radioList($listSino) ?>

    <?= $form->field($model, 'rep_egr_com_y_sug')->textarea(['rows' => 2]) ?>

    <!--Horario de la Cd. México-->
 <?php date_default_timezone_set('America/Mexico_City');?>

<?= $form->field($model, 'rep_egr_fecha_reg')->hiddenInput(['value' =>  date('Y-m-d H:i:s A')])->label(false)?>

    
    <div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
