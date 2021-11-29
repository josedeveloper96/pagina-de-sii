<?php
use common\models\Estudiantes;
use common\models\ClaPre;
use common\models\PeriodosEscolares;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
?>
<h2>Generación de gráficas de estadística de encuestas de servicio</h2>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?php
    //$modelclapre = new ClaPre();
    $id=Yii::$app->session['id'];
     echo  $form->field($model, 'nombre_cla_pre')->dropDownList(
            ArrayHelper::map(
                        (new \yii\db\Query())
                ->select("id,nombre_cla_pre")
               ->from('cla_pre')
               ->where("id > 7 and id < 15")
               ->all(),
            'id', 'nombre_cla_pre'), ['prompt' => 'Seleccione Uno' ]);
    $modelperiodo = new PeriodosEscolares();
     echo $form->field($model, 'encuesta_id')->dropDownList(ArrayHelper::map($modelperiodo::find()->orderBy(['periodos_escolares.`pesc_periodo`' => SORT_DESC])->all(),'pesc_periodo', 'pesc_identificacion_corta'), ['prompt' => 'Seleccione Uno' ]);

     ?>
    <div class="form-group">
        <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>