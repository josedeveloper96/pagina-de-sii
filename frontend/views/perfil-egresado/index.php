<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use common\models\Estudiantes;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PerfilEgresadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="perfil-egresado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::tag('div', '<h3>Información personal<h3>')?>
    </p>
    <?php
    $modelEst=Estudiantes::findOne(Yii::$app->session['usuario']);

    ?>
    <?= DetailView::widget([
        'model' => $modelEst,
        'attributes' => [
            'est_no_de_control',
            //'est_carrera',
            //'est_reticula',
            //'est_nivel_escolar',
            //'est_especialidad',
            //'est_semestre',
           // 'est_clave_interna',
           // 'est_estatus_alumno',
           // 'est_plan_de_estudios',                        
            'est_nombre_alumno',            
            'est_apellido_paterno',
            'est_apellido_materno',
            'est_curp_alumno',
            //'est_fecha_nacimiento',
            //'est_sexo',
            //'est_estado_civil',
           // 'est_tipo_ingreso',
           // 'est_periodo_ingreso_it',
           // 'est_ultimo_periodo_inscrito',
           // 'est_promedio_periodo_anterior',
           // 'est_promedio_aritmetico_acumulado',
           // 'est_creditos_aprobados',
           // 'est_creditos_cursados',
           // 'est_promedio_final_alcanzado',
           // 'est_tipo_servicio_medico',
           // 'est_clave_servicio_medico',
           // 'est_escuela_procedencia',
           // 'est_tipo_escuela',
           // 'est_domicilio_escuela',
           // 'est_entidad_procedencia',
           // 'est_ciudad_procedencia',
            'estatus',
            'carr',
            'est_semestre',
            'est_promedio_final_alcanzado',
            'est_creditos_aprobados',
            'est_correo_electronico',
            'telefono',
            
            
//                         [
//                     'attribute' => 'Imagen',
//                     'format' => 'raw',
//                     'value' => function ($model) {   
//                        if ($model->est_foto!=''){
//                            $img = Url::to('@web/uploads/estudiantes/').$img_obj['AVATAR'];
//                            return Html::img('@web/img/icon.png', ['class' => 'pull-left img-responsive']);
//                        return '<img src="'.$model->est_foto.'" width="80px" height="auto">';
//                        
//                        } else return 'no image';
//                     },
//                   ]
//                   camio
//[
//            'attribute'=>'photo',
//            'value' =>  Html::a(Html::img(Yii::getAlias('@web').'/uploads/estudiantes/'.$model->est_foto, ['alt'=>'some', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']), ['site/zoom']),
//            'format' => ['raw'],
//        ]            
          //  'est_foto',
           // 'est_firma',
           // 'est_periodo_revalidacion',
           // 'est_indice_reprobacion_acumulado',
           // 'est_becado_por',
           // 'est_nip',
           // 'est_tipo_alumno',
           // 'est_nacionalidad',
           // 'est_usuario',
           // 'est_fecha_actualizacion',
        ],
    ]) ?>


<?= Html::tag('div', '<br><h3>Ubicación y seguimiento<h3>')?>
    <p>
        <?= Html::a('Agregar nueva información', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'per_egr_id',
            'updated_at',
            'per_egr_calle',
            //'per_egr_no',
            'per_egr_colonia',
            //'per_egr_cp',
            //'per_egr_municipio_id',
            //'per_egr_estado_id',
            //'per_egr_localidad_id',
            //'per_egr_tel_cel',
            'per_egr_tel_casa',
            'per_egr_email:email',
            //'per_egr_est_civil',
            //'per_egr_ingles',
            //'per_egr_paq_com:ntext',
            //'per_egr_fecha',

            ['class' => ActionColumn::className(),'template'=>' {view} {update}'
            // ,            'buttons'=>[
            //     'print'=>function($url,$model){
            //       return Html::a('<i class="glyphicon glyphicon-print"></i>',['pdf/url'],['class'=>'btn-pdfprint btn btn-default','data-pjax'=>'0']);
            //     }
            //   ]
            ],

        ],
    ]); 
    //$url = Url::previous();
    ?>
    
    <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>

        
        
       
    
</div>
