<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RepetitivasEgresados */

$this->title ='Encuesta 1';
//$this->params['breadcrumbs'][] = ['label' => 'Encuesta', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repetitivas-egresados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->rep_egr_id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'rep_egr_id',            
            [
                'attribute' => 'rep_egr_cur_act',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->rep_egr_cur_act=='0'){//                            
                       return 'Sí';
                   } else return 'No';
                },
               ],
            //'rep_egr_posgrado',
            'rep_egr_cur_act_cuales:ntext',
                    [
                        'attribute' => 'rep_egr_posgrado',
                        'format' => 'raw',
                        'value' => function ($model) {   
                           if ($model->rep_egr_posgrado=='0'){//                            
                               return 'Sí';
                           } else return 'No';
                        },
                       ],                    
            'rep_egr_posgrado_cual:ntext',
            //'rep_egr_per_aso_egr',
            [
                'attribute' => 'rep_egr_per_aso_egr',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->rep_egr_per_aso_egr=='0'){//                            
                       return 'Sí';
                   } else return 'No';
                },
               ],     
            'rep_egr_com_y_sug:ntext',            
            [
                //EST- ESTUDIA,TRA-TRABAJA, EYT-ESTUDIA Y TRABA, NET, NO ESTUDIA NI TRABAJA- III.1 ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE.
                'attribute' => 'rep_egr_act_dedica',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->rep_egr_act_dedica){
                        case '0';
                        return 'Estudia';
                        break;
                        case '1';
                        return 'Trabaja';
                        break;
                        case '2';
                        return 'Estudia y trabaja';
                        break;
                        case '3';
                        return 'No estudia ni trabaja';
                        break;
                    }                   
                },
               ],     
            //'rep_egr_estudia',
            [
                //EST- ESTUDIA,TRA-TRABAJA, EYT-ESTUDIA Y TRABA, NET, NO ESTUDIA NI TRABAJA- III.1 ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE.
                'attribute' => 'rep_egr_estudia',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->rep_egr_estudia){
                        case '0';
                        return 'Especialidad';
                        break;
                        case '1';
                        return 'Maestría';
                        break;
                        case '2';
                        return 'Doctorado';
                        break;
                        case '3';
                        return 'Idiomas';
                        case '4':
                        return 'Otros';
                        break;
                    }                   
                },
               ], 
            'rep_egr_est_otro:ntext',
            'rep_egr_esp_ins:ntext',
            //'rep_egr_per_org_soc',
            [
                'attribute' => 'rep_egr_per_org_soc',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->rep_egr_per_org_soc=='0'){//                            
                       return 'Sí';
                   } else return 'No';
                },
               ],     
            'rep_egr_per_org_soc_cuales:ntext',
            //'rep_egr_per_org_prof',
            [
                'attribute' => 'rep_egr_per_org_prof',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->rep_egr_per_org_prof=='0'){//                            
                       return 'Sí';
                   } else return 'No';
                },
               ],     
            'rep_egr_per_org_prof_cuales:ntext',
            'rep_egr_fecha_reg',
            //'rep_egr_no_de_control',
        ],
    ]) ?>

</div>
