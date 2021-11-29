<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilEgresado */

$this->title = $model->per_egr_id;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Egresados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-egresado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->per_egr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->per_egr_id], [
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
            'per_egr_id',
            'per_egr_calle',
            'per_egr_no',
            'per_egr_colonia',
            'per_egr_cp',
            'per_egr_municipio_id',
            'per_egr_estado_id',
            'per_egr_localidad_id',
            'per_egr_tel_cel',
            'per_egr_tel_casa',
            'per_egr_email:email',
            'per_egr_est_civil',
            'per_egr_ingles',
            'per_egr_paq_com:ntext',
            'per_egr_fecha',
            'per_no_de_control',
            'per_img_scr_fname',
            'per_image_web_filename',
            'per_foto',
        ],
    ]) ?>

</div>
