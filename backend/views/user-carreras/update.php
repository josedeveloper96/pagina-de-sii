<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserCarreras */

$this->title = 'Update User Carreras: ' . $model->usc_id;
$this->params['breadcrumbs'][] = ['label' => 'User Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usc_id, 'url' => ['view', 'id' => $model->usc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-carreras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
