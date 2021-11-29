<?php
use yii\helpers\Html;
use common\models\Estudiantes;
use yii\helpers\Url;


/* @var $this yii\web\View */
$this->title = 'SII2.0';
$sexo=Yii::$app->session['sexo'];

?>
<div class="site-egrmain">
    <div class="jumbotron">

         <?= Html::a(Yii::t('app','<img style="width:300px" id="FotoP" src="'. 'images/bolsa_trabajo.png">'), ['/interes-laboral/paso1'], ['class'=>'btn btn-default', 'style' => 'padding-right:10px;']) ?>
       
        <h2>El Instituto Tecnológico de Reynosa (ITR) te da la bienvenida a su Sistema Integral de Información 2.0 </h2>
        <p class="lead"></p>
        <!--<p><a class="btn btn-lg btn-success" href="/admin/frontend/web/index.php?r=site%2Flogin">Inicie sesión para continuar</a></p>-->
    </div>
    <div class="body-content">
    <div><h2>Estimad<?php
        $oa='';
        if($sexo=='M'){ $oa= 'o';} else{  $oa= 'a';}
        echo $oa;
        ?> estudiante</h2><br>
        Los servicios educativos de este Instituto Tecnológico deben estar en mejora continua y así asegurar la pertinencia de los conocimientos adquiridos y mejorar sistemáticamente, para colaborar en la formación integral de nuestros estudiantes. Es indispensable tomarte en cuenta como factor de cambios y reformas, con el propósito de ayudar a la mejora continua del ITR, de lo cual estamos trabajando para contar con una <a href="<?=  Url::to(['/interes-laboral/paso1']); ?>">bolsa de trabajo institucional</a> y con ello te invitamos a registrar: <a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Un perfil actualizado</a>, <a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información laboral</a>, <a href="<?=  Url::to(['/inf-academ/index']); ?>">Información académica</a> y <a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a>, que nos ayudara a brindarte un mejor servicio.<br><br>
            Agradecemos tu cooperación, recibe un cordial saludo. 
            
            <?php Estudiantes::getIndicadores(); ?>
        </div>
       
    </div>
</div>
