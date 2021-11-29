<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PerfilEgresadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil Egresados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-egresado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perfil Egresado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'per_egr_id',
            'per_egr_calle',
            'per_egr_no',
            'per_egr_colonia',
            'per_egr_cp',
            //'per_egr_municipio_id',
            //'per_egr_estado_id',
            //'per_egr_localidad_id',
            //'per_egr_tel_cel',
            //'per_egr_tel_casa',
            //'per_egr_email:email',
            //'per_egr_est_civil',
            //'per_egr_ingles',
            //'per_egr_paq_com:ntext',
            //'per_egr_fecha',
            //'per_no_de_control',
            //'per_img_scr_fname',
            //'per_image_web_filename',
            //'per_foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
