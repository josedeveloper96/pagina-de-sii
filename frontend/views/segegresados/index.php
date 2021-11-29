<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

use common\models\Carreras;

//obtener los tipos de solicitudes
$id=Yii::$app->session['id'];
$es = (new \yii\db\Query())
    ->select("c.carr_carrera,c.carr_nombre_reducido")
    ->from('user_carreras uc, carreras c')
    ->where("uc.usc_user_id=$id and uc.usc_carrera=c.carr_carrera and uc.usc_reticula=c.carr_reticula")
    ->all();
//$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}";
//---------------------------------------------


/* @var $this yii\web\View */
/* @var $searchModel app\models\SegestudiantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

function is_valid_email($str)
{
    $matches = null;
    return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){

                $nc=$model->est_no_de_control;

                $es = (new \yii\db\Query())
               // ->select('count(*) ')
                ->from('correos_estudiantes')
                ->where("ce_no_de_control =$nc and ce_tipo_correo_id =1 ")
                ->count();




              if($es > 1){
               return ['class' => 'danger'];
              }
            },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'est_no_de_control',
            'est_nombre_alumno',
            'est_apellido_paterno',
            'est_apellido_materno',
            //'est_curp_alumno',
            'est_correo_electronico',
            [
                'attribute' => 'est_carrera',
                'value' => 'nmbrCarr.carr_nombre_reducido',
                //'filter'=>array("EGR"=>"EGR","ACT"=>"ACT","TIT"=>"TIT")
               //'filter'=>ArrayHelper::map(Carreras::find()->asArray()->all(), 'carr_carrera', 'carr_nombre_reducido')
                'filter'=>ArrayHelper::map($es, 'carr_carrera', 'carr_nombre_reducido')
            ],
            [
                'attribute'=>'est_estatus_alumno',
                'filter'=>array("ACT"=>"ACT","EGR"=>"EGR","TIT"=>"TIT")
            ],

            //'est_reticula',
           // 'est_nivel_escolar',
            //'est_especialidad',
            //'est_semestre',
            //'est_clave_interna',
            //'est_estatus_alumno',
            //'est_plan_de_estudios',

            //
            //'est_fecha_nacimiento',
            //
            //'est_estado_civil',
            //'est_tipo_ingreso',
            //'est_periodo_ingreso_it',
            //'est_ultimo_periodo_inscrito',
            //'est_promedio_periodo_anterior',
            //'est_promedio_aritmetico_acumulado',
            //'est_creditos_aprobados',
            //'est_creditos_cursados',
            //'est_promedio_final_alcanzado',
            //'est_tipo_servicio_medico',
            //'est_clave_servicio_medico',
            //'est_escuela_procedencia',
            //'est_tipo_escuela',
            //'est_domicilio_escuela',
            //'est_entidad_procedencia',
            //'est_ciudad_procedencia',
            //'est_correo_electronico',
            //'est_foto',
            //'est_firma',
            //'est_periodos_revalidacion',
            //'est_indice_reprobacion_acumulado',
            //'est_becado_por',
            //'est_nip',
            //'est_tipo_alumno',
            //'est_nacionalidad',
            //'est_usuario',
            //'est_fecha_actualizacion',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {correo} ',
                'buttons' => [

                    'correo' => function ($url,$model) {

                        $ex = (new \yii\db\Query())
                            ->select("*")
                            ->from('user')
                            ->where("username='{$model->est_no_de_control}' ")
                            ->all();


                        if(count($ex) > 0 && ($model->est_estatus_alumno=='TIT' || $model->est_estatus_alumno=='EGR') ){
                            return Html::a(
                                '<span class="glyphicon glyphicon-envelope"></span>',

                                //https://uniwebsidad.com/libros/bootstrap-3/capitulo-6/iconos-glyphicons?from=librosweb
                                $url,
                                [
                                    'title' => 'Enviar invitación SE',
                                    'data-pjax' => '0',
                                    'data' => [
                                        'confirm' => 'Estas seguro(a) que desea enviar la invitación?',
                                        'method' => 'post',
                                    ],
                                ]
                            );
                        }else{
                            return '';
                        }



                    },

                ],

            ],
        ],
    ]); ?>


</div>
