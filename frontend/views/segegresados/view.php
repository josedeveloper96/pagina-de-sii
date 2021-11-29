<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Estudiantes;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiantes */

$this->title = $model->est_no_de_control;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudiantes-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'est_no_de_control',
            'est_nombre_alumno',
            'est_apellido_paterno',
            'est_apellido_materno',
            //'est_curp_alumno',
            'est_correo_electronico',
            'nmbrCarr.carr_nombre_reducido',
            'est_sexo',
            'est_periodo_ingreso_it',
            'est_ultimo_periodo_inscrito',

        ],
    ]) ?>





    <!--Correos Enviados ---------------------------------------------------------------->



    <br>
    <h2>Correos Enviados</h2>


    <?php


    //obtener referencias
    $id=Yii::$app->session['id'];
    $es = (new \yii\db\Query())
        ->select("us.username,tc.tc_nombre,ce.*")
        ->from('correos_estudiantes ce, user us, tipos_correos tc')
        ->where("ce.ce_no_de_control='{$model->est_no_de_control}' and ce.ce_user_id=us.id and ce.ce_tipo_correo_id=tc.tc_id")
        ->all();
    //$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}";
    //---------------------------------------------

    ?>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha y Hora de Envio</th>
            <th scope="col">Tipo</th>


        </tr>
        </thead>
        <tbody>

        <?php
        $n=1;
        foreach($es as $c){
            //echo "{$c['carr_nombre_carrera']}<br>";
            ?>
            <tr>
                <th scope="row"><?= $n ?></th>
                <td><?= $c['username'] ?></td>
                <td><?= $c['ce_fecha'] ?></td>

                <td><?= $c['tc_nombre'] ?></td>



            </tr>

            <?php
            $n++;
        }


        ?>



        </tbody>
    </table>


    <!--Correos Enviados ----------------------------------------------------------------->





    <br>
    <h2>Referencias de Egresado</h2>

    <?= Html::a('Crear Referencia', ['createreg', 'no_de_control' => $model->est_no_de_control], ['class' => 'btn btn-primary']) ?>

    <?php


    //obtener referencias
    $id=Yii::$app->session['id'];
    $es = (new \yii\db\Query())
        ->select("us.username,reg.*")
        ->from('referencias_eg reg, user us')
        ->where("reg.reg_no_de_control='{$model->est_no_de_control}' and reg.reg_user_id=us.id")
        ->all();
    //$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}";
    //---------------------------------------------

    ?>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha y Hora de Creación</th>
            <th scope="col">Email</th>
            <th scope="col">Ac</th>
        </tr>
        </thead>
        <tbody>

        <?php
    $n=1;
        foreach($es as $c){
            //echo "{$c['carr_nombre_carrera']}<br>";
            ?>
            <tr>
                <th scope="row"><?= $n ?></th>
                <td><?= $c['username'] ?></td>
                <td><?= $c['reg_fecha'] ?></td>

                <td><?= $c['reg_email'] ?></td>
                <td>
                    <?php
                    if($c['reg_user_id']==$id){
                        echo Html::a('', ['viewreg', 'id' =>$c['reg_id']], ['class' => 'glyphicon glyphicon-eye-open']) ;
                    }
                     ?></td>

            </tr>

            <?php
            $n++;
        }


        ?>



        </tbody>
    </table>



    <h2>Estado de la Encuesta de Seguimiento de Egresado</h2>
    <?php Estudiantes::getIndicadoreseg($model->est_no_de_control); ?>
</div>
