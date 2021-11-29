<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;
//ag GRF
use app\assets\StatusAsset;
use kartik\file\FileInput;
use yii\helpers\Url;

use common\models\PerfilEgresado;
use common\models\InformacionLaboral;
use common\models\InfAcademica;

use yii\bootstrap\Modal;


if($model->inl_cuenta_empleo=='S'){
	$empleo='Mejor Empleo';
}else{
	$empleo='Empleo';
}

?>

<div class="interes-laboral-form">

	

  <h1><?= Html::encode('Preguntas de la Bolsa de Trabajo') ?></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">PREGUNTA</th>
      <th scope="col">RESPUESTA</th>
      
    </tr>
  </thead>
  <tbody>
   
    <tr>
      
      <td>¿Actualmente tienes un empleo?</td>
      <td><?php if($model->inl_cuenta_empleo=='S'){ echo "Si"; }else{ echo "No"; } ?></td>
      
    </tr>

    <tr>
      <td colspan="2" >Te podemos ayudar a conseguir a conseguir una propuesta de <?= $empleo ?>, Solo necesitamos Tu Curriculum Vitae.</td>
    </tr>


    <tr>
      <td>¿Qué Curriculum Vitae vas a utilizar?</td>
      <td><?php if($model->inl_curriculum_plataforma_archivo=='P'){ echo "El que genera esta Plataforma (Sugerido)"; }else{ echo "Curriculum Vitae en formato PDF (No sugerido)"; } ?></td>
    </tr>

 <?php if($model->inl_curriculum_plataforma_archivo=='A'){ ?>
    <tr>
      <td>Curriculum Vitae</td>
      <td><?php $model->inl_url_curriculum ?>

      <a target="_blank" href="cv/<?= $model->inl_url_curriculum ?> " >Ver Curriculum Vitae</a>
      	
      
      </td>
    </tr>
 <?php }else{ ?>

 <?php } ?>


 <tr>
     <td><a id="modalButton" href="<?=  Url::to(['/interes-laboral/privacidad']); ?>">He leído y acepto el Aviso de Privacidad (Ver)</a> </td>
      <td><?php if($model->inl_política_privacidad==1){ echo "Si"; } ?></td>
    </tr>
    
  </tbody>
</table>
  
  
  
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
  

<?= Html::a('Editar Respuestas', ['paso1u', 'id' => $model->inl_id], ['class' => 'btn btn-primary']) ?>

<?= Html::a('Ir a Inicio', ['site/estmain'], ['class' => 'btn btn-primary']) ?>

</div>