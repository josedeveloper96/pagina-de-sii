<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RefProfesionales */

$this->title = "Referencia registrada";
//$this->params['breadcrumbs'][] = ['label' => 'Ref Profesionales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-profesionales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ref_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ref_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ref_id',
            //'ref_no_de_control',
            'ref_nombres',
            'ref_email:email',
            'ref_no_cel',
            'ref_ocupacion',
        ],
    ]) ?>

</div>
