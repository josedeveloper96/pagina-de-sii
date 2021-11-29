<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = $model->emp_razon_social;
//$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'emp_id',
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
