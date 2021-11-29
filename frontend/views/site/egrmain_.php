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
        <h3>El Instituto Tecnológico de Reynosa te da la bienvenida a su Sistema de Egresados 2.0</h3>

        <p class="lead"></p>

        <!--<p><a class="btn btn-lg btn-success" href="/admin/frontend/web/index.php?r=site%2Flogin">Inicie sesión para continuar</a></p>-->
    </div>

    <div class="body-content">
        <div><h2>Estimad<?php
        $oa='';
        if($sexo=='M'){ $oa= 'o';} else{  $oa= 'a';}
        echo $oa;
        ?> egresad<?=$oa?></h2><br>
            Los servicios educativos de este Instituto Tecnológico deben estar en mejora continua y así asegurar la pertinencia de los conocimientos adquiridos y mejorar sistemáticamente, para colaborar en la formación integral de nuestros estudiantes. Para esto es indispensable tomarte en cuenta como factor de cambios y reformas, por lo que por este medio solicitamos tu valiosa participación y cooperación en esta investigación del Seguimiento de Egresados, que nos permitirá obtener información valiosa para analizar la problemática del mercado laboral y sus características, así como las competencias laborales de nuestros egresados.<br>
            Las respuestas del cuestionario anexo serán tratadas con absoluta confidencialidad y con fines meramente estadísticos.<br>
            Agradecemos tu cooperación, recibe un cordial saludo. 
        </div>
       <?php Estudiantes::getIndicadores(); ?>

    </div>
</div>
