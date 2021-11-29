<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CorreosEstudiantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Correos Masivos para Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correos-estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Correo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ce_id',
           
            'ce_asunto',
            'ce_fecha',
            'nocorreos',
            'nocorreosen',

            'estu',
            'sem',
            'cre',
            'prom',

            //'ce_contenido',
            //'ce_carrera',
            //'ce_no_de_control',
            //'ce_cesemestre_min',
            //'ce_semestre_max',
            //'ce_creditos_min',
            //'ce_creditos_max',
            //'ce_promedio_min',
            //'ce_promedio_max',
            //'ce_tipo_estudiante',
            //'ce_incluir_usycon',
            //'ce_fecha',

            ['class' => 'yii\grid\ActionColumn'
            ,'template' => '{view} {update} {enviar}'
            ,'buttons' => [

                'enviar' => function ($url,$model) { 

               
                  return Html::a(
                   '<span class="glyphicon glyphicon-envelope"></span>',
                   //https://uniwebsidad.com/libros/bootstrap-3/capitulo-6/iconos-glyphicons?from=librosweb 
                   $url, 
                   [ 
                    'title' => 'Enviar Correos', 
                    'data-pjax' => '0',                
                   ] 
                  ); 
                
             }, 

            ]
            ],
        ],
    ]); ?>


</div>
