<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Organismos;
use common\models\Localidades;
use common\models\Municipios;
use common\models\SecEcoEmpOrg;
use common\models\Estados;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-form">
<!--Por María Luisa -->
    <?php
    $listOpinion = [0 => 'Microempresa (1-30)', 1 => 'Pequeña (31-100)', 2 => 'Mediana (101-500)', 3 => 'Grande (más de 500)'];
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php
    //codigo para almacenar escondido el valor de estado y municipio
    ?>
    <?= $form->field($model, 'emp_razon_social')->textarea(['rows' => 1]) ?>
    <?= Html::tag('div', '')?>
     <?php
    //codigo agregado por jesus eduardo
    $modelorg = new Organismos();
    echo $form->field($model, 'emp_organismo')->dropDownList(ArrayHelper::map($modelorg::find()->all(),'org_id', 'org_nombre_organismo'), ['prompt' => 'Seleccione uno' ]);
    ?>


    <?= $form->field($model, 'emp_giro')->textarea(['rows' => 1]) ?>

<!--giro de la empresa:-->
<?php
    //codigo agregado por jesus eduardo
    $modelSec = new SecEcoEmpOrg();
    echo $form->field($model, 'emp_sec_eco_emp_org_id')->dropDownList(ArrayHelper::map($modelSec::find()->all(),'sec_eco_emp_org_id', 'sec_eco_emp_org_nombre_seeo'), ['prompt' => 'Seleccione uno' ]);
    ?>
    

    <?= $form->field($model, 'emp_tamano_emp_id')->radioList($listOpinion) ?>

    <?= Html::tag('div', 'Domicilio de la empresa')?>

    <?= $form->field($model, 'emp_calle')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'emp_numero')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'emp_colonia')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'emp_cp')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '99999',]) ?>
<?php
$url =Yii::$app->request->baseUrl. '/index.php?r=municipios%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
   $('#empresas-emp_estado_id').change(function(){
        var indexEstado= $('#empresas-emp_estado_id').val();
        //  var comments = $('#txtComments').val(); ejemplo de obtener valor
       //alert('funciona');
       //
       $.ajax({
        url: '$url',
        type: 'post',
        data: {idestado: indexEstado},
            success: function (data) {                
                //encontrar el dropdown a modificar
                var select = document.getElementById('empresas-emp_municipio_id'); 
                //borrar las opciones
                document.getElementById('empresas-emp_municipio_id').options.length = 0;
                document.getElementById('empresas-emp_localidad_id').options.length = 0;
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
    echo $form->field($model, 'emp_estado_id')->dropDownList(ArrayHelper::map($modelestad::find()->all(),'edo_id', 'edo_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?>

<?php
$url2 =Yii::$app->request->baseUrl. '/index.php?r=localidades%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
   $('#empresas-emp_municipio_id').change(function(){
        var indexEstado= $('#empresas-emp_municipio_id').val();
        //  var comments = $('#txtComments').val(); ejemplo de obtener valor
       //alert('funciona');
       //
       $.ajax({
        url: '$url2',
        type: 'post',
        data: {idmunic: indexEstado},
            success: function (data) {                
                //encontrar el dropdown a modificar
                var select = document.getElementById('empresas-emp_localidad_id'); 
                //borrar las opciones
                document.getElementById('empresas-emp_localidad_id').options.length = 0;
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
    echo $form->field($model, 'emp_municipio_id')->dropDownList([], ['prompt' => 'Seleccione uno' ]);
    ?>

    <?= $form->field($model, 'emp_localidad_id')->dropDownList([], ['prompt' => 'Seleccione uno' ]) ?>

    <?= $form->field($model, 'emp_ext_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_tel')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999-999-9999',]) ?>

    <?= $form->field($model, 'emp_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_web')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_comentarios')->textarea(['rows' => 6]) ?>

     <!--Horario de la Cd. México-->
     <?php date_default_timezone_set('America/Mexico_City');?>

<?= $form->field($model, 'emp_fecha_reg')->hiddenInput(['value' =>  date('Y-m-d H:i:s A')])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
