<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\InfEscuelas;
use common\models\TiposAcademicos;
/* @var $this yii\web\View */
/* @var $model common\models\InfAcademica */

$this->title = $model->infac_id;
//$this->params['breadcrumbs'][] = ['label' => 'Inf Academicas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inf-academica-view">

    
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->infac_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->infac_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'infac_id',
            [
                'attribute' => 'infac_escuela_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelS=InfEscuelas::findByID($model->infac_escuela_id);
                   return $modelS->infes_nmbre;
                },
               ],   
            //'infac_escuela_id',
            [
                'attribute' => 'infac_tipo',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelS=TiposAcademicos::findByID($model->infac_tipo);
                   return $modelS->tesc_nombre;
                },
               ], 
            //'infac_tipo',
            'infac_disiplina',
            'infac_promedio',
            'infac_registro',
            'infac_fechini',
            'infac_fechfin',
            'infac_no_de_control',
        ],
    ]) ?>

</div>
