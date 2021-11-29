<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = 'Registrar empresa';

//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
