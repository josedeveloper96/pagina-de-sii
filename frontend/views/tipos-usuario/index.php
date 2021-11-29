<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TiposUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipos Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tus_tipo_usuario',
            'tus_descripcion_tipo',
            'tus_pagina_inicial',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'header'=>'Actions',
                'template' => '{view} {update} {delete}',
                'visibleButtons'=>[
                    'view'=> function($model){
                          return true;
                     },
                ]
            ],
        ],
    ]); ?>


</div>
