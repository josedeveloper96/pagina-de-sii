<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RefProfesionalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referencias Profesionales';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-profesionales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Información', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'ref_id',
           // 'ref_no_de_control',
            'ref_nombres',
            'ref_email:email',
            'ref_no_cel',
            'ref_ocupacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
</div>
