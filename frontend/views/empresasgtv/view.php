<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Empresas */

$this->title = $model->emp_id;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empresas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['Update', 'id' => $model->emp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['Delete', 'id' => $model->emp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que quieres eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_id',
            'emp_organismo',
            'emp_giro:ntext',
            'emp_razon_social:ntext',
            'emp_calle:ntext',
            'emp_numero:ntext',
            'emp_colonia:ntext',
            'emp_cp',
            'emp_localidad_id',
            'emp_municipio_id',
            'emp_estado_id',
            'emp_tel',
            'emp_ext_tel',
            'emp_email:email',
            'emp_web',
            'emp_sec_eco_emp_org_id',
            'emp_tamano_emp_id',
            'emp_comentarios:ntext',
            'emp_fecha_reg',
        ],
    ]) ?>

</div>
