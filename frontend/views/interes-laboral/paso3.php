<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;
//ag GRF
use app\assets\StatusAsset;
use kartik\file\FileInput;
use yii\helpers\Url;


use common\models\Estudiantes;
use common\models\Pertinencia;

use yii\web\JsExpression;
use yii\bootstrap\Modal;


?>

	<div class="interes-laboral-form">

	    <?php $form = ActiveForm::begin(); ?>

	   
	    
	   
	    <?php if($model->inl_curriculum_plataforma_archivo=='P'){ ?>

             <?php Estudiantes::getIndicadores(); ?>
            <br><br>
            
            <a class="btn btn-success" id="modalButtonCV" href="<?=  Url::to(['/cvitae/index2']); ?>">Ver el Curriculum Vitae</a>
		
		
	    	
	    <?php }else{ 

	    	//subir archivo
	    	?>

	    	

     <!--ag GRF subir archivos-->
		    <div class="row">
		      <?= $form->field($model, 'inl_url_curriculum')->widget(FileInput::classname(), [
		              'options' => ['accept' => 'file/*'],
		               'pluginOptions'=>['allowedFileExtensions'=>['pdf'],'showUpload' => false,],
		          ]);   ?>
    		</div>

	    <?php } ?>


	     <?php //$form->field($model, 'con_url')->textInput(['maxlength' => true]) 
                  $session = Yii::$app->session; 
                                
                 if(Pertinencia::getPersonalCount(Yii::$app->session['usuario']) < 1 && ($session['rol']=="TIT" ||$session['rol']=="EGR" )){
                    
                    echo Html::a('Contestar Encuesta de Satisfacción', ['/pertinencia/create'], ['class' => 'btn btn-success']);
                     
                    }
                 
                 ?>
	    
		<br>	
                <h4><a id="modalButton" href="<?=  Url::to(['/interes-laboral/privacidad']); ?>">Ver el Aviso de Privacidad</a></h4>
		<?= $form->field($model, 'inl_política_privacidad')->checkbox() ?>
	    
	    <div class="form-group">
	    	<?= Html::a('Regresar', ['paso2', 'id' => $model->inl_id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::submitButton('Terminar', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
                
                 <?php
                    Modal::begin([
                      'header' => '<h3>Aviso de Privacidad</h3>',
                      'id' => 'modal',
                      'size' => 'modal-lg',
                      

                     // 'toggleButton' => ['label' => 'click me'],
                  ]);

                  echo "<div id='modalContent'></div>";

                  Modal::end();
                  
                  ?>

	</div>
