<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\TiempoPrimerEmpleo;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Pertinencia */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="pertinencia-form">
    <?php
    $list = [0 => 'Malo', 1 => 'Regular', 2 => 'Bueno', 3 => 'Muy bueno'];
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?php
    //$modeltiempoprimEmp=new TiempoPrimerEmpleo();
   // echo $form->field($model, 'per_tiempo_tran_prim_emp_id')->dropDownList(ArrayHelper::map($modeltiempoprimEmp::find()->all(),'tie_pem_id', 'tie_pem_nombre'), ['prompt' => 'Seleccione Uno' ]); 
    ?>
    
     <?= $form->field($model, 'per_tiempo_tran_prim_emp_id')->dropDownlist(ArrayHelper::map(TiempoPrimerEmpleo::find()->all(),'tie_pem_id','tie_pem_nombre'),['prompt'=>'Seleccione...']) ?>


    <?= Html::tag('div', '<br><h4><b>Califique la calidad de la educación profesional proporcionada por el personal docente, así como el Plan de Estudios de la carrera
    que cursó y las condiciones del plantel en cuanto a infraestructura.</b><h4>')?>

    <?= $form->field($model, 'per_no_de_control')->hiddenInput(['value'=>Yii::$app->session['usuario']])->label(false) ?>

    <?php
              
                echo $form->field($model, 'per_cal_doc')->radioList($list); 
            ?>

    <?= $form->field($model, 'per_plan_es')->radioList($list) ?>

    <?= $form->field($model, 'per_opr_part')->radioList($list) ?>

    <?= $form->field($model, 'per_enf_inv')->radioList($list) ?>

    <?= $form->field($model, 'per_sat_con')->radioList($list) ?>

    <?= $form->field($model, 'per_exp_obt')->radioList($list) ?>

<!--     //codigo agregado por jesus eduardo
    $modelcontra = new CondTra();
        echo $form->field($model, 'inf_lab_cond_tra_id')->dropDownList(ArrayHelper::map($modelcontra::find()->all(),'cond_tra_id', 'cond_tra_nombre'), ['prompt' => 'Seleccione Uno' ]);
 
    -->

 <!--Horario de la Cd. México-->
 <?php date_default_timezone_set('America/Mexico_City');?>

    <?php //$form->field($model, 'per_fecha_registro')->hiddenInput(['value' =>  date('Y-m-d H:i:s A')])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
</div>
