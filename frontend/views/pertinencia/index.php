<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PertinenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'PERTINENCIA Y DISPONIBILIDAD DE MEDIOS Y RECURSOS PARA EL APRENDIZAJE';
$this->title = 'Encuesta de satisfacción';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pertinencia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php /*echo $this->render('_search', ['model' => $searchModel]); */?>

    <p>
        
        <?= Html::a('Contestar encuesta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->per_no_de_control), ['view', 'id' => $model->per_no_de_control]);
        },
    ]) ?>
    
     <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
</div>
