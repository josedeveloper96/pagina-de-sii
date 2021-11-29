<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InteresLaboral */

$this->title = 'Create Interes Laboral';
$this->params['breadcrumbs'][] = ['label' => 'Interes Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interes-laboral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
