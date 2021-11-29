<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ladas */

$this->title = 'Create Ladas';
$this->params['breadcrumbs'][] = ['label' => 'Ladas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ladas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
