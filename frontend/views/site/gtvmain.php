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





//obtener los tipos de solicitudes
$id=Yii::$app->session['id'];
$es = (new \yii\db\Query())
     ->select("c.carr_nombre_carrera,c.carr_reticula")
    ->from('user_carreras uc, carreras c')
    ->where("uc.usc_user_id=$id and uc.usc_carrera=c.carr_carrera and uc.usc_reticula=c.carr_reticula")
    ->all();
//$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}";
//---------------------------------------------



?>



<div class="site-egrmain">

    <div class="jumbotron">

        <h3>El Instituto Tecnológico de Reynosa te da la bienvenida a su Sistema de Egresados 2.0</h3>

        <p class="lead"></p>

        <!--<p><a class="btn btn-lg btn-success" href="/admin/frontend/web/index.php?r=site%2Flogin">Inicie sesión para continuar</a></p>-->
    </div>

    <div class="body-content">

        <div><h3>Carreras:</h3>

            <?php

            //print_r($es);

                foreach($es as $c){
                echo "{$c['carr_nombre_carrera']}<br>";
               }


            ?>
            
            
        </div>


    </div>
</div>
