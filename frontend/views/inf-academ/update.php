<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InfAcademica */

$this->title = 'Modificar';
//$this->params['breadcrumbs'][] = ['label' => 'Inf Academicas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->infac_id, 'url' => ['view', 'id' => $model->infac_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inf-academica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
