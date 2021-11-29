<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Localidades;
use common\models\Municipios;
use common\models\Estados;
use yii\helpers\ArrayHelper;
//ag GRF
use app\assets\StatusAsset;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilEgresado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-egresado-form">

<?php $listOpinion = [0 => 'Soltero(a)', 1 => 'Casado(a)', 2 => 'Otro']; ?>
<?php $listOpinionB = [0 => '0%', 1 => '25%', 2 => '50%', 3 => '75%', 4 => '100%']; ?>

    <?php $form = ActiveForm::begin(); ?>
    <?php
$url =Yii::$app->request->baseUrl. '/index.php?r=municipios%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
   $('#perfilegresado-per_egr_estado_id').change(function(){
        var indexEstado= $('#perfilegresado-per_egr_estado_id').val();
        //  var comments = $('#txtComments').val(); ejemplo de obtener valor
       //alert('funciona');
       //
       $.ajax({
        url: '$url',
        type: 'post',
        data: {idestado: indexEstado},
            success: function (data) {                
                //encontrar el dropdown a modificar
                var select = document.getElementById('perfilegresado-per_egr_municipio_id'); 
                //borrar las opciones
                document.getElementById('perfilegresado-per_egr_municipio_id').options.length = 0;
                document.getElementById('perfilegresado-per_egr_localidad_id').options.length = 0;
            //console.log(data.search);
           // alert(data);
           var obj=JSON.parse(data);
           for(i in obj){
            if (obj.hasOwnProperty(i)) {
                var val = obj[i];
                //crear la opcion
                var el = document.createElement('option');
                //asignarle el valor
                el.textContent = val.mpio_nombre;
                //asignarle el id
                el.value=val.mpio_id;
                //asignar la nueva opcion a el dropdown
                select.appendChild(el);
                //console.log(val.mpio_nombre);
              }
            //alert(i.mpio_nombre);
           }
           //
            }
        });
      //
    });
});
");

?>
    <!--ag GRF subir archivos-->
    <div class="row">
      <?= $form->field($model, 'per_img_scr_fname')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
          ]);   ?>
  </div>
<?= $form->field($model, 'per_img_scr_fname')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'per_image_web_filename')->textInput(['maxlength' => true]) ?>

    <?php
    
    //codigo agregado por jesus eduardo
    $modelestad = new Estados();
    echo $form->field($model, 'per_egr_estado_id')->dropDownList(ArrayHelper::map($modelestad::find()->all(),'edo_id', 'edo_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?>
    
    <?php
$url2 =Yii::$app->request->baseUrl. '/index.php?r=localidades%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
   $('#perfilegresado-per_egr_municipio_id').change(function(){
        var indexEstado= $('#perfilegresado-per_egr_municipio_id').val();
        //  var comments = $('#txtComments').val(); ejemplo de obtener valor
       //alert('funciona');
       //
       $.ajax({
        url: '$url2',
        type: 'post',
        data: {idmunic: indexEstado},
            success: function (data) {                
                //encontrar el dropdown a modificar
                var select = document.getElementById('perfilegresado-per_egr_localidad_id'); 
                //borrar las opciones
                document.getElementById('perfilegresado-per_egr_localidad_id').options.length = 0;
            //console.log(data.search);
           // alert(data);
           var obj=JSON.parse(data);
           for(i in obj){
            if (obj.hasOwnProperty(i)) {
                var val = obj[i];
                //crear la opcion
                var el = document.createElement('option');
                //asignarle el valor
                el.textContent = val.loc_nombre;
                //asignarle el id
                el.value=val.loc_id;
                //asignar la nueva opcion a el dropdown
                select.appendChild(el);
                //console.log(val.mpio_nombre);
              }
            //alert(i.mpio_nombre);
           }
           //
            }
        });
      //
    });
});
");

?>

    <?php
    //codigo agregado por jesus eduardo
   // $modelestad = new Estados();
    echo $form->field($model, 'per_egr_municipio_id')->dropDownList([], ['prompt' => 'Seleccione uno' ]);
    ?>    

    <?= $form->field($model, 'per_egr_localidad_id')->dropDownList([], ['prompt' => 'Seleccione uno' ]) ?>     

    <?= $form->field($model, 'per_egr_calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_cp')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '99999',]) ?>



    <?= $form->field($model, 'per_egr_tel_casa')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(999)-999-9999',]) ?>

    <?= $form->field($model, 'per_egr_tel_cel')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(999)-999-9999',]) ?>   

    <?= $form->field($model, 'per_egr_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_egr_est_civil')->radioList($listOpinion) ?>

    <?= $form->field($model, 'per_egr_ingles')->radioList($listOpinionB)?>

    <?= $form->field($model, 'per_egr_paq_com')->textarea(['rows' => 6]) ?>
    
    <!--Horario de la Cd. México-->
    <?php date_default_timezone_set('America/Mexico_City');?>


    <?= $form->field($model, 'per_egr_fecha')->hiddenInput(['value' =>  date('Y-m-d H:i:s A')])->label(false)?>
    

    <?= $form->field($model, 'per_no_de_control')->hiddenInput(['value'=>Yii::$app->session['usuario']])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
