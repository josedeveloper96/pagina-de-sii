<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\conveniosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Convenios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'con_id',
            'con_tipo_convenio_id',
            'con_empresa_id',
            'con_fecha_inicio',
            'con_fecha_termino',
            //'con_url:url',
            //'con_estado_convenio_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
