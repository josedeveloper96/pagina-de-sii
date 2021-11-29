<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InteresLaboral */

$this->title = $model->inl_id;
$this->params['breadcrumbs'][] = ['label' => 'Interes Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interes-laboral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->inl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->inl_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'inl_id',
            'inl_no_de_control',
            'inl_cuenta_empleo',
            'inl_conseguir_empleo',
            'inl_política_privacidad',
            'inl_curriculum_plataforma_archivo',
            'inl_url_curriculum:url',
        ],
    ]) ?>

</div>
