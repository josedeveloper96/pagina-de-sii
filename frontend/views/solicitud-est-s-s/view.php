<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudServicioSocial */

$this->title = $model->ss_id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Servicio Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="solicitud-servicio-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ss_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ss_id], [
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
            'ss_id',
            'ss_no_de_control',
            'ss_empresa_id',
            'ss_nombre_programa',
            'ss_modalidad_id',
            'ss_fecha_inicio',
            'ss_fecha_termino',
            'ss_actividades_resumidas',
            'ss_tipo_programa_id',
            'ss_otro_tipo_programa',
            'ss_aceptado',
            'ss_observaciones_sol',
            'ss_responsable_programa',
            'ss_area_responsable_programa',
            'ss_puesto_responsable_programa',
            'ss_justificiacion_programa',
            'ss_objetivos_programa',
            'ss_funciones_progrma',
            'ss_actividades_detalladas_programa',
            'ss_observaciones_programa',
        ],
    ]) ?>

</div>
