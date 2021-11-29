<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasEg */

//$this->title = $model->reg_id;
//$this->params['breadcrumbs'][] = ['label' => 'Referencias Egs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="referencias-eg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->reg_id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->reg_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'reg_id',
            'reg_no_de_control',
            'reg_email:email',
            'reg_cel',
            'reg_facebook',
            'reg_linkedin',
            'reg_instragram',
            'reg_twitter',
            'reg_skype',
            'reg_comentario',
            'reg_fecha',
            'reg_user_id',
        ],
    ]) ?>

</div>
