<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepetitivasEgresados */

$this->title = 'Actualizar Repetitivas Egresados';
//$this->params['breadcrumbs'][] = ['label' => 'Repetitivas Egresados', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->rep_egr_id, 'url' => ['view', 'id' => $model->rep_egr_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repetitivas-egresados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
