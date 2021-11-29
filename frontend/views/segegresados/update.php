<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiantes */

$this->title = 'Update Estudiantes: ' . $model->est_no_de_control;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->est_no_de_control, 'url' => ['view', 'id' => $model->est_no_de_control]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
