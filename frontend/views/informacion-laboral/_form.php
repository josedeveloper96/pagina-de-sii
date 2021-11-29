<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\Empresas;
use common\models\Ingreso;
use common\models\MedioEm;
use common\models\CondTra;
use common\models\NivelJer;
use common\models\RequisitosCont;
use common\models\IdiomasTrabajo;
use common\models\InformacionLaboral;
use kartik\slider\Slider;
//para mejor visualización
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\InformacionLaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informacion-laboral-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $listOpinion = [0 => 'Muy poco', 1 => 'Poco', 2 => 'Regular', 3 => 'Suficiente', 4 => 'Mucho'];
    ?>

    <?php
    $listOpinion0 = [0 => 'Muy poco', 1 => 'Poco', 2 => 'Regular', 3 => 'Suficiente', 4 => 'Mucho',5 => 'No Aplica'];
    ?>

    <?php
    $listOpinionA = [0 => '0%', 1 => '20%', 2 => '40%', 3 => '60%', 4 => '80%', 5=> '100%'];
    ?>

    <?php
    $listOpinionB = [0 => 'Muy eficiente', 1 => 'Eficiente', 2 => 'Poco eficiente', 3 => 'Deficiente'];
    ?>

    <?php
    $listOpinionB0 = [0 => 'Muy eficiente', 1 => 'Eficiente', 2 => 'Poco eficiente', 3 => 'Deficiente', 4 => 'No Aplica'];
    ?>

    <?php
    $listOpinionC = [0 => 'Excelente', 1 => 'Bueno', 2 => 'Regular', 3 => 'Malo'];
    ?>

     <?php
    $listOpinionC0 = [0 => 'Excelente', 1 => 'Bueno', 2 => 'Regular', 3 => 'Malo', 4 => 'No Aplica'];
    ?>
    

    <?= $form->field($model, 'inf_lab_no_de_control')->hiddenInput(['value'=>Yii::$app->session['usuario']])->label(false);
     ?>

    <?php
    //codigo agregado por jesus eduardo
    $modelempresa = new Empresas();
    echo $form->field($model, 'inf_lab_empresa_id')->dropDownList(ArrayHelper::map($model->getEmpresas(),'emp_id', 'emp_razon_social'), ['prompt' => 'Seleccione Uno' ]);
    ?>
        <?php
$url =Yii::$app->request->baseUrl. '/index.php?r=empresas%2Fsample'; //ndex.php?r=empresas%2Fcreate
$_csrf=Yii::$app->request->getCsrfToken();
$this->registerJs("
$(function(){
    //function principal
   $('#informacionlaboral-inf_lab_empresa_id').change(function(){
      var emp_id= $('#informacionlaboral-inf_lab_empresa_id').val();
      //alert(emp_id);
    $.ajax({
        url: '$url',
        type: 'post',
        data: {empid: emp_id},
            success: function (data) {          
                          
                var select = document.getElementById('DatosEmpresa'); 
                var obj=JSON.parse(data);
                var cadena='';
                for(i in obj){

                        var val = obj[i];                
                        cadena = cadena + 'calle: ' + val.emp_calle + '<br>No. ' + val.emp_numero + '<br>Colonia: ' + val.emp_colonia;
                        //console.log(val.mpio_nombre);

                    //alert(i.mpio_nombre);
                }            
            select.innerHTML =cadena; 
           //
            }
        //fin ajaX
        });
    //fin change function
    });
//fin function principal
});
");
?>
<?= Html::label('', 'xxx', ['id'=>'DatosEmpresa']) ?>
    <p>
    <?= Html::tag('div','<h4>'.'Si su empresa no se encuentra registrada presione el siguiente botón:'.'</h4>')?>
        <?php
        $urlregemp =Yii::$app->request->baseUrl. '/index.php?r=empresas%2Fcreate'; 
        echo  Html::a('Registrar empresa',$urlregemp, ['class' => 'btn btn-success']);
         ?>
         <br>
    </p>

    <?php echo $form->field($model, 'inf_lab_fecha_ing_emp')->widget(DatePicker::className(), [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
]); ?>
    

    <?php echo $form->field($model, 'ing_lab_fecha_ter_emp')->widget(DatePicker::className(), [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
]); //ing_lab_fecha_ter_emp?>



    <?= $form->field($model, 'inf_lab_nombre_ji')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_lab_puesto_ji')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_lab_ext_ji')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_lab_telefono_ji')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(999)-999-9999',]) ?>

    <?= $form->field($model, 'inf_lab_email_ji')->textInput(['maxlength' => true]) ?>

<!--    <?php //$form->field($model, 'inf_lab_empresa_id')->textInput() ?>
    -->  


<!--
    <?php// $form->field($model, 'inf_lab_medio_em_id')->textInput() ?>
    -->
    <?php
    //codigo agregado por jesus eduardo
    $modelmedio = new MedioEm();
    echo $form->field($model, 'inf_lab_medio_em_id')->dropDownList(ArrayHelper::map($modelmedio::find()->all(),'medio_em_id', 'medio_em_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?>
    <?= $form->field($model, 'inf_lab_otro_medio_em')->textarea(['row' => 2]) ?>
<!--
    <?php// $form->field($model, 'inf_lab_requisitos_con_id')->textInput() ?>
    -->
    <?php
    //codigo agregado por jesus eduardo
    $modelreq = new RequisitosCont();
    echo $form->field($model, 'inf_lab_requisitos_con_id')->dropDownList(ArrayHelper::map($modelreq::find()->all(),'requisito_cont_id', 'requisito_cont_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?>

    <?= $form->field($model, 'inf_lab_otro_requisitos_con')->textarea(['rows' => 2]) ?>

<!--    
    <?php// $form->field($model, 'inf_lab_nivel_jer_id')->textInput() ?>
    -->
        <?php
    //codigo agregado por jesus eduardo
    $modelnvljer = new NivelJer();
    echo $form->field($model, 'inf_lab_nivel_jer_id')->dropDownList(ArrayHelper::map($modelnvljer::find()->all(),'nivel_jer_id', 'nivel_jer_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?>
    
    <?= $form->field($model, 'inf_lab_otro_nivel_jer')->textInput() ?>
    
    <?php
    //codigo agregado por jesus eduardo
    $modelcontra = new CondTra();
    echo $form->field($model, 'inf_lab_cond_tra_id')->dropDownList(ArrayHelper::map($modelcontra::find()->all(),'cond_tra_id', 'cond_tra_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?> 
    <?= $form->field($model, 'inf_lab_otro_cond_tra')->textInput(['maxlength' => true]) ?>
    <?php
    //codigo agregado por jesus eduardo
    $modelingr = new Ingreso();
    echo $form->field($model, 'inf_lab_ingreso_salario_id')->dropDownList(ArrayHelper::map($modelingr::find()->all(),'ingreso_id', 'ingreso_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?> 
    

    <?php// ?>

    <?= $form->field($model, 'inf_lab_rel_for')->radioList($listOpinionA) ?>

<!--    
    <?php// $form->field($model, 'inf_lab_idiomas_trabajo_id')->textInput() ?>
    -->
                   <?php
    //codigo agregado por jesus eduardo
    $modelidio = new IdiomasTrabajo();
        echo $form->field($model, 'inf_lab_idiomas_trabajo_id')->dropDownList(ArrayHelper::map($modelidio::find()->all(),'idioma_tbj_id', 'idioma_tbj_nombre'), ['prompt' => 'Seleccione uno' ]);
    ?> 
    
    <?= $form->field($model, 'inf_lab_uso_ie_hablar')->textInput() ?>

    <?= $form->field($model, 'inf_lab_uso_ie_escribir')->textInput() ?>

    <?= $form->field($model, 'inf_lab_uso_ie_leer')->textInput() ?>

    <?= $form->field($model, 'inf_lab_uso_ie_escuchar')->textInput() ?>

    <?= $form->field($model, 'inf_lab_otro_idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_lab_efi_rea_act')->radioList($listOpinionB) ?>

    <?= $form->field($model, 'inf_lab_com_cal_for_aca')->radioList($listOpinionC) ?>

    <?= $form->field($model, 'inf_lab_uti_res_pro')->radioList($listOpinionC0) ?>

    <?= Html::tag('div',''.'<b>De los siguientes aspectos, ¿Qué grado de importancia valoró la empresa para tu contratación como estudiante ó egresado?</b> <br>'.'<br>')?>

    <?= $form->field($model, 'inf_lab_are_cam_est')->radioList($listOpinion0) ?>

    <?= $form->field($model, 'inf_lab_titulacion')->radioList($listOpinion0) ?>

    <?= $form->field($model, 'inf_lab_exp_lab')->radioList($listOpinion) ?>

    <?= $form->field($model, 'inf_lab_com_lab')->radioList($listOpinion)?>

    <?= $form->field($model, 'inf_lab_pos_int_egre')->radioList($listOpinion) ?>

    <?= $form->field($model, 'inf_lab_con_idio_ext')->radioList($listOpinion)?>

    <?= $form->field($model, 'inf_lab_rec_ref')->radioList($listOpinion)?>

    <?= $form->field($model, 'inf_lab_per_act')->radioList($listOpinion) ?>

    <?= $form->field($model, 'inf_lab_cap_lid')->radioList($listOpinion) ?>

     <!--Horario de la Cd. México-->
     <?php date_default_timezone_set('America/Mexico_City');?>

<!--Código por Luisa-->
    <?= $form->field($model, 'inf_lab_fecha_registro')->hiddenInput(['value' =>  date('Y-m-d H:i:s A')])->label(false)?>


    <div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
