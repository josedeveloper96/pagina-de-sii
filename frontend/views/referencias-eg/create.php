<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasEg */

$this->title = 'Create Referencias Eg';
$this->params['breadcrumbs'][] = ['label' => 'Referencias Egs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referencias-eg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
