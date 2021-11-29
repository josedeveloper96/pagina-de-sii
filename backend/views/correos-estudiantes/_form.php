<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Carreras;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model common\models\CorreosEstudiantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correos-estudiantes-form">

    <?php $form = ActiveForm::begin(); ?>

   
    

    <div class="row">
      <div class="col-12">
         <?= $form->field($model, 'ce_asunto')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
     
     <div class="row">    
        <div class="col-12">


           <?= $form->field($model, 'ce_contenido')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    //'imageManagerJson' => [Yii::$app->basePath . '/web/uploads/'],
                    //'imageUpload' => [Yii::$app->basePath . '/web/uploads/'],
                    //'fileUpload' => [Yii::$app->basePath . '/web/uploads/'],
                    'uploadDir' => \Yii::$app->basePath.'/web/uploads',
                    //'uploadUrl' => Url::home('https').\Yii::$app->request->BaseUrl.'/uploads',
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
            ]) ?>


          <?php 

          // https://github.com/yiidoc/yii2-redactor

         


   
           //https://www.yiiframework.com/extension/froala/yii2-froala-editor
          /* echo froala\froalaeditor\FroalaEditorWidget::widget([
            'model' => $model,
            'attribute' => 'ce_contenido',
            'options' => [
                // html attributes
                'id'=>'content'
            ],
            'clientOptions' => [
                'toolbarInline' => false,
                'theme' => 'royal', //optional: dark, red, gray, royal
                'language' => 'es_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
            ]
        ]); */?>
       </div>    
    </div>
     
     <div class="row">
      <div class="col-lg-6 col-12">
         <?php 
        $var = [ 'ACT' => 'Estudiantes Activos', 'EGR' => 'Egresados',  'TIT' => 'Titulados'];
        echo $form->field($model, 'ce_tipo_estudiante')->dropDownList($var, ['prompt' => 'Seleccione Uno' ]);
        ?>
      </div>
      <div class="col-lg-6 col-12">
         <?= $form->field($model, 'ce_no_de_control')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12">
        <?= $form->field($model, 'ce_carrera')->dropDownlist(ArrayHelper::map(Carreras::find()->all(),'carr_carrera','carr_nombre_carrera'),['prompt'=>'Seleccione Uno']) ?>

      </div>
    </div>
    
    
     <div class="row">
      <div class="col-lg-6 col-12">
         <?= $form->field($model, 'ce_semestre_min')->textInput() ?>
      </div>
      <div class="col-lg-6 col-12">
          <?= $form->field($model, 'ce_semestre_max')->textInput() ?>
      </div>
    </div>
    
     <div class="row">
      <div class="col-lg-6 col-12">
         <?= $form->field($model, 'ce_creditos_min')->textInput() ?>
      </div>
      <div class="col-lg-6 col-12">
          <?= $form->field($model, 'ce_creditos_max')->textInput() ?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-6 col-12">
         <?= $form->field($model, 'ce_promedio_min')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-6 col-12">
           <?= $form->field($model, 'ce_promedio_max')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
     
     

    
    

   

   
    
    
    
    

   

   

   

    

    

    

   

    
    

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
