<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferenciasEgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referencias Egs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referencias-eg-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Referencias Eg', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'reg_id',
            'reg_no_de_control',
            'reg_email:email',
            'reg_cel',
            'reg_facebook',
            //'reg_linkedin',
            //'reg_instragram',
            //'reg_twitter',
            //'reg_skype',
            //'reg_comentario',
            //'reg_fecha',
            //'reg_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
