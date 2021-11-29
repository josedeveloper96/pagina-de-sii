<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InteresLaboral */

$this->title = 'Update Interes Laboral: ' . $model->inl_id;
$this->params['breadcrumbs'][] = ['label' => 'Interes Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inl_id, 'url' => ['view', 'id' => $model->inl_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="interes-laboral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
