<?php
use miloschuman\highcharts\Highcharts;      //el motor de gráficas
use miloschuman\highcharts\SeriesDataHelper;//el que ordena las gráficas
use common\models\Pertinencia;
use common\models\RepetitivasEgresados;
use common\models\InformacionLaboral;
use yii\helpers\Html;

/* Gráficas:
 * Instalación:
 * https://www.yiiframework.com/extension/yii2-highcharts-widget
 * 
 * Documentación:
 *  https://www.highcharts.com/docs/ 
 * 
 * 
 *  */

//con el modelo se obtiene la carrera y el periodo:
//echo \yii\helpers\VarDumper::dump($model);
//echo "Soy multicarrera: ".$multicarrera."<br>";


    $conexion = \Yii::$app->db;
    $userid = Yii::$app->user->identity->id;

    $sql = "select nombre_cla_pre,(select `pesc_identificacion_corta` from `periodos_escolares`  where pesc_periodo='$periodo') periodo from `cla_pre` where id=:encuesta";
    $comando = $conexion->createCommand($sql);
    $comando->bindValue(":encuesta", $encuesta);
    //$comando->bindValue(":model_id", $model_id);
    if($result = $comando->queryOne()) {
        $en=$result['nombre_cla_pre'];
        $pe=$result['periodo'];
    } else {
        $en='';
    }

    ?>
    <h3><?php echo " $en periodo $pe"; ?> </h3>

    <?php

    $sql_p="select * from preguntas where `cla_pre_id`=:encuesta order by ord desc ";
    $comando2=$conexion->createCommand($sql_p);
    $comando2->bindValue(":encuesta",$encuesta);
    $rp=$comando2->queryAll();

    //$periodo='20193';

     foreach($rp as $p){

         if($p['tipo_pre_id']==1){
                //ABIERTA = GRILLA
         }else if($p['tipo_pre_id']==2){
                //CERRADAS OPCIÓN UNICA = GRAFICA
         ?>

         <?php

            // echo "<h4> {$p['nombre_pre']} </h4>";
             //Graficas

             //repuestas
             $sql_o="select * from op_pre where pregunta_id={$p['id']} and status='A' order by ord ASC";
             $com=$conexion->createCommand($sql_o);
             $o=$com->queryAll();


             $n=0;
             foreach ($o as $op){




             //total de respuestas
                 $sql_r="
                        select (select count(*) from respuestas_ce rc, `encuestados` en , estudiantes e 
                        where rc.`encuestados_id`=en.`id` 
                        and en.`periodo`='$periodo'
                        and e.est_no_de_control=en.no_de_control
                        and rc.`op_pre`={$op['id']}
                        and en.no_de_control <> ''
                        and e.est_sexo='M') masculino,
                        (select count(*) from respuestas_ce rc, `encuestados` en , estudiantes e 
                        where rc.`encuestados_id`=en.`id` 
                        and en.`periodo`='$periodo'
                        and e.est_no_de_control=en.no_de_control
                        and rc.`op_pre`={$op['id']}
                        and en.no_de_control <> ''
                        and e.est_sexo='F') femenino,
                        (select count(*) from respuestas_ce rc, `encuestados` en , estudiantes e 
                        where rc.`encuestados_id`=en.`id` 
                        and en.`periodo`='$periodo'
                        and e.est_no_de_control=en.no_de_control
                        and rc.`op_pre`={$op['id']}
                        and en.no_de_control <> ''
                        ) total
                        
                        ";

              $com2=$conexion->createCommand($sql_r);
              //$com2->bindValue(":periodo",$periodo);
              //$com2->bindValue(":op",$op['id']);
              $row=$com2->queryOne();


                    $opc[$n]=$op['op_pre'];
                    $rm[$n]=(int) $row['masculino'];
                    $rf[$n]=(int) $row['femenino'];
                    $rt[$n]=(int) $row['total'];



                $n=$n+1;
             }//opciones




             echo Highcharts::widget([


                     'scripts' => [
                     'modules/exporting',
                     'modules/annotations'
                 ],
                 'options' => [
                     'title' => ['text' => $p['nombre_pre']],
                     'annotations'=> [[
                         'labelOptions'=> [
                             'backgroundColor'=> 'rgba(73,127, 67,0.8)',
                             'verticalAlign'=> 'top'
                         ],
                         /*
                         'labels'=> [[
                             'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
                             'text'=> 'Porcentaje esperado: '.$etiqueta
                         ]]*/
                     ]],
                     'xAxis' => [
                         'categories' => $opc,
                        // 'min'=>0,
                         //'max'=>3,
                     ],
                     'yAxis' => [
                         'title' => ['text' => 'incidencia']
                     ],

                     'series' => [
                         ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => $rt],

                         /*['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],*/

                         ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => $rf],
                         ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => $rm],

                     ]
                 ]
             ]);

            unset($rm);
            unset($rf);
            unset($rt);
            unset($opc);


         }


     }//foreach preguntas

?>



