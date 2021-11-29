<?php

use common\models\UserCarreras;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserCarreras */

$this->title = 'Create User Carreras';
//$this->params['breadcrumbs'][] = ['label' => 'User Carreras', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-carreras-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="user-carreras-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php // $form->field($model, 'usc_user_id')->textInput() ?>

        <?= $form->field($model, 'usc_carrera')->dropDownlist(ArrayHelper::map(\common\models\Carreras::listCarr(),'carr_carrera','carr_nombre_carrera'),['prompt'=>'Seleccione...']) ?>

        <?php // $form->field($model, 'usc_reticula')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
