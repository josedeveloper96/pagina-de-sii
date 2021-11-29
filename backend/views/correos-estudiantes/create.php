<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CorreosEstudiantes */

$this->title = 'Crear Correo';
$this->params['breadcrumbs'][] = ['label' => 'Correos Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correos-estudiantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
