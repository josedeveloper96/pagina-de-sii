<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudEstServicioSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitud Servicio Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-servicio-social-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Solicitud Servicio Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ss_id',
            'ss_no_de_control',
            'ss_empresa_id',
            'ss_nombre_programa',
            'ss_modalidad_id',
            //'ss_fecha_inicio',
            //'ss_fecha_termino',
            //'ss_actividades_resumidas',
            //'ss_tipo_programa_id',
            //'ss_otro_tipo_programa',
            //'ss_aceptado',
            //'ss_observaciones_sol',
            //'ss_responsable_programa',
            //'ss_area_responsable_programa',
            //'ss_puesto_responsable_programa',
            //'ss_justificiacion_programa',
            //'ss_objetivos_programa',
            //'ss_funciones_progrma',
            //'ss_actividades_detalladas_programa',
            //'ss_observaciones_programa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
