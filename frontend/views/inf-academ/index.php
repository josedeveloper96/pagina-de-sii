<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InfAcademicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información académica';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inf-academica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Información', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'infac_id',
            //'infac_escuela_id',
            [
                'attribute' => 'infac_escuela_id',
                'value' => 'infacEscuela.infes_nmbre',
                    //'filter'=>array("EGR"=>"EGR","ACT"=>"ACT","TIT"=>"TIT")
                    //'filter'=>ArrayHelper::map(PeriodosEscolares::find()->asArray()->all(), 'pesc_periodo', 'pesc_identificacion_corta')
            ],
            [
                'attribute' => 'infac_tipo',
                'value' => 'infacTipo.tesc_nombre',
                    //'filter'=>array("EGR"=>"EGR","ACT"=>"ACT","TIT"=>"TIT")
                    //'filter'=>ArrayHelper::map(PeriodosEscolares::find()->asArray()->all(), 'pesc_periodo', 'pesc_identificacion_corta')
            ],
            //'infacEscuela.infes_nmbre',
            //'infac_tipo',
            'infac_disiplina',
            'infac_promedio',
            //'infac_registro',
            //'infac_fechini',
            //'infac_fechfin',
            //'infac_no_de_control',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
</div>
