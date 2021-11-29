<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pertinencia */

$this->title = 'Encuesta de satisfacción';
//$this->params['breadcrumbs'][] = ['label' => 'Pertinencias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pertinencia-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
