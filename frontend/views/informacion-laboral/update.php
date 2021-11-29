<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InformacionLaboral */

$this->title = 'Actualizar Informacion Laboral';
//$this->params['breadcrumbs'][] = ['label' => 'Informacion Laboral', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->inf_lab_id, 'url' => ['view', 'id' => $model->inf_lab_id]];
//this->params['breadcrumbs'][] = 'Update';
?>
<div class="informacion-laboral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
