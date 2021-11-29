<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
use common\models\PerfilEgresado;
use common\models\InformacionLaboral;
use common\models\InfAcademica;
use common\models\RepetitivasEgresados;
use common\models\Pertinencia;
//$this->title = '';

use common\models\Estudiantes;
use yii\helpers\Url;
?>

<?php $sexo=Yii::$app->session['sexo']; ?>

<div class="site-egrmain">

    <div class="jumbotron">
         <?= Html::a(Yii::t('app','<img style="width:300px" id="FotoP" src="'. 'images/bolsa_trabajo.png">'), ['/interes-laboral/paso1'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
        <h3>El Instituto Tecnológico de Reynosa te da la bienvenida a su SII 2.0</h3>

        <p class="lead"></p>

        <!--<p><a class="btn btn-lg btn-success" href="/admin/frontend/web/index.php?r=site%2Flogin">Inicie sesión para continuar</a></p>-->
    </div>

    <div class="body-content">
       <h1>Estimado(a) Empresario(a)</h1>
        


    </div>
</div>
