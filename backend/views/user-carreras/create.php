<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserCarreras */

$this->title = 'Create User Carreras';
$this->params['breadcrumbs'][] = ['label' => 'User Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-carreras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
