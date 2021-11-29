<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InfEscuelas */

$this->title = 'Actualizar información de la institución';
//$this->params['breadcrumbs'][] = ['label' => 'Inf Escuelas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->infes_id, 'url' => ['view', 'id' => $model->infes_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inf-escuelas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
