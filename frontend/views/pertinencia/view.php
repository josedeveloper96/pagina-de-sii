<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use common\models\TiempoPrimerEmpleo;


/* @var $this yii\web\View */
/* @var $model app\models\Pertinencia */

$this->title = 'Mis respuestas:';
//$this->params['breadcrumbs'][] = ['label' => 'Encuesta de satisfacción', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pertinencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Actualizar', ['update', 'id' => $model->per_no_de_control], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'per_no_de_control',
           // 'per_cal_doc',
            [
                'attribute' => 'per_cal_doc',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_cal_doc){
                        case '0';
                        return 'Malo';
                        break;
                        case '1';
                        return 'Regular';
                        break;
                        case '2';
                        return 'Bueno';
                        break;
                        case '3';
                        return 'Muy bueno';
                        break;
                    }                   
                },
               ],     
           // 'per_plan_es',
            [                
                'attribute' => 'per_plan_es',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_plan_es){
                        case '0';
                        return 'Malo';
                        break;
                        case '1';
                        return 'Regular';
                        break;
                        case '2';
                        return 'Bueno';
                        break;
                        case '3';
                        return 'Muy bueno';
                        break;
                    }                   
                },
               ], 
            //'per_opr_part',
            [                
                'attribute' => 'per_opr_part',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_opr_part){
                        case '0';
                        return 'Malo';
                        break;
                        case '1';
                        return 'Regular';
                        break;
                        case '2';
                        return 'Bueno';
                        break;
                        case '3';
                        return 'Muy bueno';
                        break;
                    }                   
                },
               ], 
            //'per_enf_inv',
            [                
                'attribute' => 'per_enf_inv',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_enf_inv){
                        case '0';
                        return 'Malo';
                        break;
                        case '1';
                        return 'Regular';
                        break;
                        case '2';
                        return 'Bueno';
                        break;
                        case '3';
                        return 'Muy bueno';
                        break;
                    }                   
                },
               ], 
            //'per_sat_con',
            [                
                'attribute' => 'per_sat_con',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_sat_con){
                        case '0';
                        return 'Malo';
                        break;
                        case '1';
                        return 'Regular';
                        break;
                        case '2';
                        return 'Bueno';
                        break;
                        case '3';
                        return 'Muy bueno';
                        break;
                    }                   
                },
               ], 
            //'per_exp_obt',
            [                
                'attribute' => 'per_exp_obt',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->per_exp_obt){
                        case '0';
                        return 'Malo';
                        break;
                        case '1';
                        return 'Regular';
                        break;
                        case '2';
                        return 'Bueno';
                        break;
                        case '3';
                        return 'Muy bueno';
                        break;
                    }                   
                },
               ],                
            'tpe',
            'updated_at',
        ],
    ]) ?>

   
</div>
