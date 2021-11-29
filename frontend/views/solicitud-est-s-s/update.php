<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudServicioSocial */

$this->title = 'Update Solicitud Servicio Social: ' . $model->ss_id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Servicio Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ss_id, 'url' => ['view', 'id' => $model->ss_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-servicio-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
