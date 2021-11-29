<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InfAcademica */

$this->title = 'Registro de Información Académica';
//$this->params['breadcrumbs'][] = ['label' => 'Inf Academicas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inf-academica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
