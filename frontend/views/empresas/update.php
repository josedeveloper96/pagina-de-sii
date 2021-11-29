<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = 'Actualizar Empresa';
//$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->emp_id, 'url' => ['view', 'id' => $model->emp_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
