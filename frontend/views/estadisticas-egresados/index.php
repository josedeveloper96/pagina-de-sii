<?php
use common\models\Estudiantes;
use common\models\Carreras;
use common\models\PeriodosEscolares;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
?>
<h1>Generación de gráficas de estadística de seguimiento de egresados</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?php
    $modelempresa = new Carreras();
    $id=Yii::$app->session['id'];
     echo  $form->field($model, 'carrera')->dropDownList(
            ArrayHelper::map(
                        (new \yii\db\Query())
                ->select("c.carr_nombre_carrera,c.carr_carrera")
               ->from('user_carreras uc, carreras c')
               ->where("uc.usc_user_id=$id and uc.usc_carrera=c.carr_carrera and uc.usc_reticula=c.carr_reticula")
               ->all(),
            'carr_carrera', 'carr_nombre_carrera'), ['prompt' => 'Seleccione Uno' ]); 
    $modelperiodo = new PeriodosEscolares();
     echo $form->field($model, 'periodo')->dropDownList(ArrayHelper::map($modelperiodo::find()->orderBy(['periodos_escolares.`pesc_periodo`' => SORT_DESC])->all(),'pesc_periodo', 'pesc_identificacion_corta'), ['prompt' => 'Seleccione Uno' ]); 

     ?>
    <div class="form-group">
        <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>