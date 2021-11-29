<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasEg */

$this->title = 'Update Referencias Eg: ' . $model->reg_id;
$this->params['breadcrumbs'][] = ['label' => 'Referencias Egs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reg_id, 'url' => ['view', 'id' => $model->reg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referencias-eg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
