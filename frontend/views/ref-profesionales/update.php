<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RefProfesionales */

$this->title = 'Actualizar referencias';
//$this->params['breadcrumbs'][] = ['label' => 'Ref Profesionales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ref_id, 'url' => ['view', 'id' => $model->ref_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-profesionales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
