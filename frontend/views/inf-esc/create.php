<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InfEscuelas */

$this->title = 'Agregar nueva institución';
//$this->params['breadcrumbs'][] = ['label' => 'Inf Escuelas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inf-escuelas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
