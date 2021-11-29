<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PerfilEgresado */

$this->title = 'Create Perfil Egresado';
$this->params['breadcrumbs'][] = ['label' => 'Perfil Egresados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-egresado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
