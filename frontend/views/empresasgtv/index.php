<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmpresasgtvSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Empresas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_id',
            'emp_organismo',
            'emp_giro:ntext',
            'emp_razon_social:ntext',
            'emp_calle:ntext',
            //'emp_numero:ntext',
            //'emp_colonia:ntext',
            //'emp_cp',
            //'emp_localidad_id',
            //'emp_municipio_id',
            //'emp_estado_id',
            //'emp_tel',
            //'emp_ext_tel',
            //'emp_email:email',
            //'emp_web',
            //'emp_sec_eco_emp_org_id',
            //'emp_tamano_emp_id',
            //'emp_comentarios:ntext',
            //'emp_fecha_reg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
