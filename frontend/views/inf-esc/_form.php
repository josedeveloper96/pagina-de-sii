<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Localidades;
use common\models\Municipios;
use common\models\Estados;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\InfEscuelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inf-escuelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'infes_nmbre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infes_direccion')->textInput(['maxlength' => true]) ?>
    <?php
        //codigo agregado por jesus eduardo
$url =Yii::$app->request->baseUrl. '/index.php?r=municipios%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
   $('#infescuelas-infes_estado').change(function(){
        var indexEstado= $('#infescuelas-infes_estado').val();
        //  var comments = $('#txtComments').val(); ejemplo de obtener valor
       //alert('funciona');
       //
       $.ajax({
        url: '$url',
        type: 'post',
        data: {idestado: indexEstado},
            success: function (data) {                
                //encontrar el dropdown a modificar
                var select = document.getElementById('infescuelas-infes_municipio'); 
                //borrar las opciones
                document.getElementById('infescuelas-infes_municipio').options.length = 0;
                document.getElementById('infescuelas-infes_localidad').options.length = 0;
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
    <?php
    //codigo agregado por jesus eduardo
    $modelestad = new Estados();
    echo $form->field($model, 'infes_estado')->dropDownList(ArrayHelper::map($modelestad::find()->all(),'edo_id', 'edo_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?>
    <?php
$url2 =Yii::$app->request->baseUrl. '/index.php?r=localidades%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
   $('#infescuelas-infes_municipio').change(function(){
        var indexEstado= $('#infescuelas-infes_municipio').val();
        //  var comments = $('#txtComments').val(); ejemplo de obtener valor
       //alert('funciona');
       //
       $.ajax({
        url: '$url2',
        type: 'post',
        data: {idmunic: indexEstado},
            success: function (data) {                
                //encontrar el dropdown a modificar
                var select = document.getElementById('infescuelas-infes_localidad'); 
                //borrar las opciones
                document.getElementById('infescuelas-infes_localidad').options.length = 0;
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
    <?= $form->field($model, 'infes_municipio')->dropDownList([], ['prompt' => 'Seleccione uno' ])?>

    <?= $form->field($model, 'infes_localidad')->dropDownList([], ['prompt' => 'Seleccione uno' ]) ?>

    <?= $form->field($model, 'infes_telefono')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(999)-999-9999',]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
