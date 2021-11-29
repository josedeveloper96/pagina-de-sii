<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\TiposUsuario;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User ';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

   

<div class="user-form">

     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            
        ],
    ]) ?>
    
    <?php $form = ActiveForm::begin(); ?>
    
   


    <?= $form->field($model, 'status')->radioList( ['2'=>'Activo', '1' => 'Inactivo', '0' => 'Eliminado'], ['unselect' => null] ) ?>
    
    
    <?= $form->field($model, 'role')->dropDownlist(ArrayHelper::map(TiposUsuario::find()->all(),'tus_tipo_usuario','tus_descripcion_tipo'),['prompt'=>'Seleccione...']) ?>

    
  
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
