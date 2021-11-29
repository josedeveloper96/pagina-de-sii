<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\multiselect\MultiSelect;
use yii\web\JsExpression;
?>

	<div class="interes-laboral-form">

	    <?php $form = ActiveForm::begin(); ?>

	   
	    <h3>¿Actualmente tienes un empleo?</h3>
	   
	    
	    <?php
	    $listOpinion = ['S' => 'Si', 'N' => 'No'];
	    ?>
	    <?= $form->field($model, 'inl_cuenta_empleo')->radioList($listOpinion) ?>

		<h3>Estas buscando : </h3>

		

		

		<?= $form->field($model, 'inl_empleo')->radioList($listOpinion) ?>

		<?= $form->field($model, 'inl_rp')->radioList($listOpinion) ?>

		<?= $form->field($model, 'inl_ss')->radioList($listOpinion) ?>

		<?= $form->field($model, 'inl_med')->radioList($listOpinion) ?>




		

		
	    

	    <div class="form-group">
	        <?= Html::submitButton('Siguiente', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>