<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CorreosEstudiantes */

$this->title = 'Actualizar Correo: ' . $model->ce_id;
$this->params['breadcrumbs'][] = ['label' => 'Correos Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ce_id, 'url' => ['view', 'id' => $model->ce_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="correos-estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
