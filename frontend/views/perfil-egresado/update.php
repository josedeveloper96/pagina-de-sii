<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilEgresado */

$this->title = 'Actualizar perfil:';
//$this->params['breadcrumbs'][] = ['label' => 'Perfil Egresados', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->per_egr_id, 'url' => ['view', 'id' => $model->per_egr_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-egresado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
