

<?php
use yii\helpers\Url;
$avance= $model->est_creditos_aprobados * 100 / 260;
echo "<h1>Tus creditos aprobados Son: ".$model->est_creditos_aprobados.", ".round($avance)."%</h1>";
//




if($avance >= 70){
    echo "<h2>Puedes Solicitar Servicio Social</h2>";
    ?>
    <a class="btn btn-lg btn-success" href="<?=  Url::to(['/solicitud-est-s-s/create']); ?>">Crear Solicitud</a>
    <?php
}else{
    echo "<h2>No puedes Solicitar el Servicio Social, hasta tener el 70% de creditos aprobados</h2>";
}
