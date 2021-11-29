<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InteresLaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interes Laborals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interes-laboral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Interes Laboral', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'inl_id',
            'inl_no_de_control',
            'inl_cuenta_empleo',
            'inl_conseguir_empleo',
            'inl_política_privacidad',
            //'inl_curriculum_plataforma_archivo',
            //'inl_url_curriculum:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
