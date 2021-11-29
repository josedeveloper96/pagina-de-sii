<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InteresLaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interes Laborals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interes-laboral-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Interes Laboral', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'inl_id',
            'inl_no_de_control',
            'nombre',
            'carrera',
            'sem',
            'cem',
            'aviso',
            //'inl_conseguir_empleo',
            //'inl_política_privacidad',

            'inl_curriculum_plataforma_archivo',
            //'inl_url_curriculum:url',
            //'inl_fecha_update',
            'inl_paso',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}'
            ,'buttons' => [

                'view' => function ($url,$model) { 

               
                  return Html::a(
                   '<span class="glyphicon glyphicon-list-alt"></span>',
                   //https://uniwebsidad.com/libros/bootstrap-3/capitulo-6/iconos-glyphicons?from=librosweb 
                   $url, 
                   [ 
                    'title' => 'Ver Curricum Vitae', 
                    'data-pjax' => '0',                
                   ] 
                  ); 
                
             }, 

            ]],
        ],
    ]); ?>


</div>
