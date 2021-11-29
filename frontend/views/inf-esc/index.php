<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InfEscuelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información de la Institución';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inf-escuelas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva información', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'infes_id',
            'infes_nmbre',
            'infes_direccion',
            'infes_estado',
            'infes_municipio',
            //'infes_localidad',
            //'infes_telefono',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
