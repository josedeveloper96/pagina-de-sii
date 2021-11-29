<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\convenios */

$this->title = 'Create Convenios';
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
