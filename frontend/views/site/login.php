<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Entrar al Sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor complete los siguientes campos para iniciar sesión:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:red;margin:1em 0">
                	Nota. Si eres Estudiante o Egresado(a) del ITR y no cuentas tu con un Número de Control o Nip, solicitalos al email: plan_reynosa@tecnm.mx
                    <!--Si olvidó su contraseña puede <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    ¿Necesita un nuevo correo electrónico de verificación? <?= Html::a('Resend', ['site/resend-verification-email']) ?>-->
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
