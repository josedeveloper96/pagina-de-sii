<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


if($model->inl_cuenta_empleo=='S'){
	$empleo='Mejor Empleo';
}else{
	$empleo='Empleo';
}


?>

	<div class="interes-laboral-form">

	    <?php $form = ActiveForm::begin(); ?>

	   
	    
	   
	    
	    <?php
	    $listOpinion = ['P' => 'El que genera esta Plataforma (Sugerido)', 'A' => 'Subir el Curriculum Vitae en formato PDF (No sugerido)'];
	    ?>

	    <h3>Te podemos ayudar a conseguir una propuesta de <?= $empleo ?>, Solo necesitamos Tu Curriculum Vitae.</h3>
		
		<h3>¿Qué Curriculum Vitae vas a utilizar?</h3>
		<?= $form->field($model, 'inl_curriculum_plataforma_archivo')->radioList($listOpinion) ?>

	    
	   
	    

	    <div class="form-group">
	    	<?= Html::a('Regresar', ['paso1u', 'id' => $model->inl_id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::submitButton('Siguiente', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>

