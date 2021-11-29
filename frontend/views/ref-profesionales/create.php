<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RefProfesionales */

$this->title = 'Referencias profesionales';
//$this->params['breadcrumbs'][] = ['label' => 'Ref Profesionales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-profesionales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
