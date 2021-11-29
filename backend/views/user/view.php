<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'statusg',
            'roleg',
            //'created_at',
            //'updated_at',
            //'verification_token',
        ],
    ]) ?>


    <?php
        if($model->role=='SEG' || $model->role=='DAC' ){

    ?>

            <h2>Carreras Asignadas</h2>

            <?= Html::a('Asignar Carrera', ['createuc', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <br>
            <br>


            <?php
            //$id=Yii::$app->session['id'];
            $es = (new \yii\db\Query())
                ->select("uc.usc_id,c.carr_nombre_carrera,c.carr_reticula")
                ->from('user_carreras uc, carreras c')
                ->where("uc.usc_user_id={$model->id} and uc.usc_carrera=c.carr_carrera and uc.usc_reticula=c.carr_reticula")
                ->all();
//$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}";
//---------------------------------------------

            ?>

            <?php

            //print_r($es);

            foreach($es as $c){
                echo Html::a('', ['deleteuc', 'id'=>$model->id,'idc' =>$c['usc_id']], ['class' => 'glyphicon glyphicon-trash'])." - {$c['carr_nombre_carrera']}<br>";
            }


            ?>
            <br>




    <?php } ?>

</div>
