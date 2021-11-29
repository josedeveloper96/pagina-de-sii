<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pertinencia */

$this->title = 'Registros:';
//$this->params['breadcrumbs'][] = ['label' => 'Pertinencias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->per_no_de_control, 'url' => ['view', 'id' => $model->per_no_de_control]];
//$this->params['breadcrumbs'][] = 'Ver registro';
?>
<div class="pertinencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
