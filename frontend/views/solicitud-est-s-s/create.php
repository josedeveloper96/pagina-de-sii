<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudServicioSocial */

$this->title = 'Crear Solicitud de Servicio Social';
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Servicio Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-servicio-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
