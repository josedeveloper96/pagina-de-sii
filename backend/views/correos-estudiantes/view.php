<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CorreosEstudiantes */

$this->title = $model->ce_id;
$this->params['breadcrumbs'][] = ['label' => 'Correo Masivo para Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="correos-estudiantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ce_id], ['class' => 'btn btn-primary']) ?>
        <?php /*Html::a('Delete', ['delete', 'id' => $model->ce_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ce_id',
           
            'ce_asunto',
            //'ce_contenido',
            'ce_fecha',
            'nocorreos',
            'nocorreosen',
            'ce_carrera',
            'ce_no_de_control',
            'ce_semestre_min',
            'ce_semestre_max',
            'ce_creditos_min',
            'ce_creditos_max',
            'ce_promedio_min',
            'ce_promedio_max',
            'ce_tipo_estudiante',
            'ce_incluir_usycon',
            
        ],
    ]) ?>

</div>
