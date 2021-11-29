<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Localidades;
use common\models\Municipios;
use common\models\Estados;
//ugr
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\PerfilEgresado */

$this->title = 'Datos registrados:';
//$this->params['breadcrumbs'][] = ['label' => 'Perfil Egresados', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-egresado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->per_egr_id], ['class' => 'btn btn-primary']) ?>

    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'per_egr_id',
            'per_egr_calle',
            'per_egr_no',
            'per_egr_colonia',
            'per_egr_cp',
           // 'per_egr_municipio_id',
            [
                'attribute' => 'per_egr_estado_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $modelS=Estados::findByID($model->per_egr_estado_id);
                    //echo $modelS->edo_nombre;
                   return $modelS->edo_nombre;
                },
               ],
            //'per_egr_estado_id',
            [
                'attribute' => 'per_egr_municipio_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $modelM=Municipios::findByID($model->per_egr_municipio_id);
                   return $modelM->mpio_nombre;
                },
               ],
           // 'per_egr_localidad_id',
            [
                'attribute' => 'per_egr_localidad_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $modelL=Localidades::findByID($model->per_egr_localidad_id);
                   return $modelL->loc_nombre;
                },
               ],
            'per_egr_tel_cel',
            'per_egr_tel_casa',
            'per_egr_email:email',
            //'per_egr_est_civil'
            [
                'attribute' => 'per_egr_est_civil',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_egr_est_civil){
                        case '0';
                        return 'Soltero(a)';
                        break;
                        case '1';
                        return 'Casado(a)';
                        break;
                        case '2';
                        return 'Otro';
                        
                    }                   
                },
               ], 
            //'per_egr_ingles',
            [
                'attribute' => 'per_egr_ingles',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_egr_ingles){
                        case '0';
                        return '0%';
                        break;
                        case '1';
                        return '25%';
                        break;
                        case '2';
                        return '50%';
                        break;
                        case '3';
                        return '75%';
                        break;
                        case '4';
                        return '100%';
                        break;
                        
                    }                   
                },
               ], 
            'per_egr_paq_com:ntext',
            'updated_at',
            //'per_no_de_control',
        ],
    ]) ?>

</div>
