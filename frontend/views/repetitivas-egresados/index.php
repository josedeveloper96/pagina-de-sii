<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;  
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\repetitivasegresadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encuesta de egreso';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repetitivas-egresados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Contestar encuesta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'rep_egr_id',
            //'rep_egr_cur_act',
            [
                     'attribute' => 'rep_egr_cur_act',
                     'format' => 'raw',
                     'value' => function ($model) {   
                        if ($model->rep_egr_cur_act=='1'){//                            
                            return 'Sí';
                        } else return 'No';
                     },
                    ],
                   // 'rep_egr_cur_act_cuales:ntext',
                    [
                        'attribute' => 'rep_egr_posgrado',
                        'format' => 'raw',
                        'value' => function ($model) {   
                           if ($model->rep_egr_cur_act=='1'){//                            
                               return 'Sí';
                           } else return 'No';
                        },
                       ],        
           // 'rep_egr_posgrado',
            
           // 'rep_egr_posgrado_cual:ntext',
            //'rep_egr_per_aso_egr',
            //'rep_egr_com_y_sug:ntext',
            //'rep_egr_act_dedica',
            [
                //EST- ESTUDIA,TRA-TRABAJA, EYT-ESTUDIA Y TRABA, NET, NO ESTUDIA NI TRABAJA- III.1 ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE.
                'attribute' => 'rep_egr_act_dedica',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->rep_egr_act_dedica){
                        case '0';
                        return 'ESTUDIA';
                        break;
                        case '1';
                        return 'TRABAJA';
                        break;
                        case '2';
                        return 'ESTUDIA Y TRABAJA';
                        break;
                        case '3';
                        return 'NO ESTUDIA NI TRABAJA';
                    }                   
                },
               ], 
            //'rep_egr_estudia',
            //'rep_egr_est_otro:ntext',
            //'rep_egr_esp_ins:ntext',
            //'rep_egr_per_org_soc',
            [
                'attribute' => 'rep_egr_per_org_soc',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->rep_egr_per_org_soc=='1'){//                            
                       return 'Sí';
                   } else return 'No';
                },
               ],        
            //'rep_egr_per_org_soc_cuales:ntext',
            //'rep_egr_per_org_prof',
            [
                'attribute' => 'rep_egr_per_org_prof',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->rep_egr_per_org_prof=='1'){//                            
                       return 'Sí';
                   } else return 'No';
                },
               ],   
            //'rep_egr_per_org_prof_cuales:ntext',
            //'rep_egr_no_de_control',

            ['class' =>  ActionColumn::className(),'template'=>'{view} {update}'],
        ],
    ]); ?>
</div>
