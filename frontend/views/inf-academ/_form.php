<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\InfEscuelas;
use common\models\TiposAcademicos;

/* @var $this yii\web\View */
/* @var $model common\models\InfAcademica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inf-academica-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    //codigo agregado por jesus eduardo
    $modelempresa = new InfEscuelas();
    echo $form->field($model, 'infac_escuela_id')->dropDownList(ArrayHelper::map($modelempresa::find()->all(),'infes_id', 'infes_nmbre'), ['prompt' => 'Seleccione Uno' ]);
    ?>
     <p>
    <?= Html::tag('div','<h4>'.'Si su institución no se encuentra registrada presione el siguiente botón:'.'</h4>')?>
        <?php
        $urlregemp =Yii::$app->request->baseUrl. '/index.php?r=inf-esc%2Fcreate'; 
        echo  Html::a('Registrar institución',$urlregemp, ['class' => 'btn btn-success']);
         ?>
         <br>
    </p>
    <?php
    //codigo agregado por jesus eduardo
    $modelempresa = new TiposAcademicos();
    echo $form->field($model, 'infac_tipo')->dropDownList(ArrayHelper::map($modelempresa::find()->all(),'tesc_id', 'tesc_nombre'), ['prompt' => 'Seleccione Uno' ]);
    ?>
    <?= $form->field($model, 'infac_disiplina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infac_promedio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infac_registro')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'infac_fechini')->widget(DatePicker::className(), [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
]); ?>

    <?php echo $form->field($model, 'infac_fechfin')->widget(DatePicker::className(), [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
]); ?>
    <?= $form->field($model, 'infac_no_de_control')->hiddenInput(['maxlength' => true,'value' => Yii::$app->session['usuario']])->label(false)?> 

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
