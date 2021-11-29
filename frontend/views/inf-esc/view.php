<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Estados;
use common\models\Municipios;
use common\models\Localidades;

/* @var $this yii\web\View */
/* @var $model common\models\InfEscuelas */

$this->title = $model->infes_nmbre;
//$this->params['breadcrumbs'][] = ['label' => 'Inf Escuelas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inf-escuelas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->infes_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->infes_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'infes_nmbre',
            'infes_direccion',
            [
                'attribute' => 'infes_estado',
                'format' => 'raw',
                'value' => function ($model) {   
                    if(!empty($model->infes_estado)){
                        $modelS=Estados::findByID($model->infes_estado);

                        return $modelS->edo_nombre;
                    }else{
                        return null;
                    }

                },
               ], 
               [
                'attribute' => 'infes_municipio',
                'format' => 'raw',
                'value' => function ($model) {   
                    if(!empty($model->infes_municipio)){
                    $modelS=Municipios::findByID($model->infes_municipio);
                   return $modelS->mpio_nombre;
                    }else{
                        return null;
                    }
                },
               ],
               [
                'attribute' => 'infes_municipio',
                'format' => 'raw',
                'value' => function ($model) {   
                    if(!empty($model->infes_localidad)){
                    $modelS=Localidades::findByID($model->infes_localidad);
                   return $modelS->loc_nombre;
                    }else{
                        return null;
                    }
                },
               ],   
            //'infes_estado',
            //'infes_municipio',
            //'infes_localidad',
            'infes_telefono',
        ],
    ]) ?>

</div>
