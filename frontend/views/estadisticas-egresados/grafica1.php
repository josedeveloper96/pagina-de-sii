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
?>
<h1>PERTINENCIA Y DISPONIBILIDAD DE MEDIOS Y RECURSOS PARA EL APRENDIZAJE</h1>
<p>
    <?php
    $MaloM       =0+ Pertinencia::getCaldoc("EGRTIT",0,'M','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $RegularM    =0+ Pertinencia::getCaldoc("EGRTIT",1,'M','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $BuenoM      =0+ Pertinencia::getCaldoc("EGRTIT",2,'M','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $MbuenoM     =0+ Pertinencia::getCaldoc("EGRTIT",3,'M','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $MaloF       =0+ Pertinencia::getCaldoc("EGRTIT",0,'F','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $RegularF    =0+ Pertinencia::getCaldoc("EGRTIT",1,'F','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $BuenoF      =0+ Pertinencia::getCaldoc("EGRTIT",2,'F','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $MbuenoF     =0+ Pertinencia::getCaldoc("EGRTIT",3,'F','per_cal_doc',$model->carrera, $model->periodo,$multicarrera);
    $PorcentajeEsperado=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.75;
    $etiqueta=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => 'Calidad de los docentes'],
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
          'categories' => ['Muy bueno', 'Bueno', 'Regular','Malo'],
          'min'=>0,
          'max'=>3,
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MbuenoM+$MbuenoF,$BuenoM+$BuenoF,$RegularM+$RegularF,$MaloM+$MaloF]],
          
          /*['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],*/

          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MbuenoF,$BuenoF,$RegularF,$MaloF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MbuenoM,$BuenoM,$RegularM,$MaloM]],

          ]
    ]
 ]);

//grafica 2
 $MaloM       =0+ Pertinencia::getCaldoc("EGRTIT",0,'M','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $RegularM    =0+ Pertinencia::getCaldoc("EGRTIT",1,'M','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $BuenoM      =0+ Pertinencia::getCaldoc("EGRTIT",2,'M','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoM     =0+ Pertinencia::getCaldoc("EGRTIT",3,'M','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $MaloF       =0+ Pertinencia::getCaldoc("EGRTIT",0,'F','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $RegularF    =0+ Pertinencia::getCaldoc("EGRTIT",1,'F','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $BuenoF      =0+ Pertinencia::getCaldoc("EGRTIT",2,'F','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoF     =0+ Pertinencia::getCaldoc("EGRTIT",3,'F','per_plan_es',$model->carrera, $model->periodo,$multicarrera);
 $PorcentajeEsperado=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.75;
 $etiqueta=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
 'options' => [
    'title' => ['text' => 'Plan de estudios'],
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
       'categories' => ['Muy bueno', 'Bueno', 'Regular','Malo'],
       'min'=>0,
       'max'=>3,
    ],
    'yAxis' => [
       'title' => ['text' => 'incidencia']
    ],
    'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MbuenoM+$MbuenoF,$BuenoM+$BuenoF,$RegularM+$RegularF,$MaloM+$MaloF]],
        
        /*
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],*/


       ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MbuenoF,$BuenoF,$RegularF,$MaloF]],  
       ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MbuenoM,$BuenoM,$RegularM,$MaloM]],
    ]
 ]
]);

 //grafica 3
 $MaloM       =0+ Pertinencia::getCaldoc("EGRTIT",0,'M','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $RegularM    =0+ Pertinencia::getCaldoc("EGRTIT",1,'M','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $BuenoM      =0+ Pertinencia::getCaldoc("EGRTIT",2,'M','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoM     =0+ Pertinencia::getCaldoc("EGRTIT",3,'M','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $MaloF       =0+ Pertinencia::getCaldoc("EGRTIT",0,'F','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $RegularF    =0+ Pertinencia::getCaldoc("EGRTIT",1,'F','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $BuenoF      =0+ Pertinencia::getCaldoc("EGRTIT",2,'F','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoF     =0+ Pertinencia::getCaldoc("EGRTIT",3,'F','per_opr_part',$model->carrera, $model->periodo,$multicarrera);
 $PorcentajeEsperado=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.75;
 $etiqueta=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.80;
echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
 'options' => [
    'title' => ['text' => 'Oportunidad de participar en proyectos de investigación y desarrollo'],
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
       'categories' => ['Muy bueno', 'Bueno', 'Regular','Malo'],
       'min'=>0,
       'max'=>3,
    ],
    'yAxis' => [
       'title' => ['text' => 'incidencia']
    ],
    'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MbuenoM+$MbuenoF,$BuenoM+$BuenoF,$RegularM+$RegularF,$MaloM+$MaloF]],
       /* 
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
       */

       ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MbuenoF,$BuenoF,$RegularF,$MaloF]],  
       ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MbuenoM,$BuenoM,$RegularM,$MaloM]],
       ]
 ]
]);

//grafica 4
 $MaloM       =0+ Pertinencia::getCaldoc("EGRTIT",0,'M','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $RegularM    =0+ Pertinencia::getCaldoc("EGRTIT",1,'M','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $BuenoM      =0+ Pertinencia::getCaldoc("EGRTIT",2,'M','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoM     =0+ Pertinencia::getCaldoc("EGRTIT",3,'M','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $MaloF       =0+ Pertinencia::getCaldoc("EGRTIT",0,'F','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $RegularF    =0+ Pertinencia::getCaldoc("EGRTIT",1,'F','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $BuenoF      =0+ Pertinencia::getCaldoc("EGRTIT",2,'F','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoF     =0+ Pertinencia::getCaldoc("EGRTIT",3,'F','per_enf_inv',$model->carrera, $model->periodo,$multicarrera);
 $PorcentajeEsperado=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.75;
 $etiqueta=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
 'options' => [
    'title' => ['text' => 'Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza'],
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
       'categories' => ['Muy bueno', 'Bueno', 'Regular','Malo'],
       'min'=>0,
       'max'=>3,
    ],
    'yAxis' => [
       'title' => ['text' => 'incidencia']
    ],
    'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MbuenoM+$MbuenoF,$BuenoM+$BuenoF,$RegularM+$RegularF,$MaloM+$MaloF]],
       /*
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
       */
       ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MbuenoF,$BuenoF,$RegularF,$MaloF]],  
       ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MbuenoM,$BuenoM,$RegularM,$MaloM]],

       ]
 ]
]);

//grafica 4
 $MaloM       =0+ Pertinencia::getCaldoc("EGRTIT",0,'M','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $RegularM    =0+ Pertinencia::getCaldoc("EGRTIT",1,'M','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $BuenoM      =0+ Pertinencia::getCaldoc("EGRTIT",2,'M','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoM     =0+ Pertinencia::getCaldoc("EGRTIT",3,'M','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $MaloF       =0+ Pertinencia::getCaldoc("EGRTIT",0,'F','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $RegularF    =0+ Pertinencia::getCaldoc("EGRTIT",1,'F','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $BuenoF      =0+ Pertinencia::getCaldoc("EGRTIT",2,'F','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $MbuenoF     =0+ Pertinencia::getCaldoc("EGRTIT",3,'F','per_sat_con',$model->carrera, $model->periodo,$multicarrera);
 $PorcentajeEsperado=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.75;
 $etiqueta=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
 'options' => [
    'title' => ['text' => 'Satisfacción con las condiciones de estudio (infraestructura)'],
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
       'categories' => ['Muy bueno', 'Bueno', 'Regular','Malo'],
       'min'=>0,
       'max'=>3,
    ],
    'yAxis' => [
       'title' => ['text' => 'incidencia']
    ],
    'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MbuenoM+$MbuenoF,$BuenoM+$BuenoF,$RegularM+$RegularF,$MaloM+$MaloF]],
        

        /*['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
        */

       ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MbuenoF,$BuenoF,$RegularF,$MaloF]],  
       ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MbuenoM,$BuenoM,$RegularM,$MaloM]],
   
       ]
 ]
]);

?>
<h1>UBICACIÓN LABORAL DE LOS EGRESADOS</h1>
<?php


$TrabajaM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$EstudiaM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$TrabEstM    =0+ RepetitivasEgresados::getRepet("EGRTIT",2,'M','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$NTrabEstM   =0+ RepetitivasEgresados::getRepet("EGRTIT",3,'M','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$TrabajaF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$EstudiaF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$TrabEstF    =0+ RepetitivasEgresados::getRepet("EGRTIT",2,'F','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$NTrabEstF   =0+ RepetitivasEgresados::getRepet("EGRTIT",3,'F','rep_egr_act_dedica',$model->carrera, $model->periodo,$multicarrera);
$PorcentajeEsperado=(($TrabajaM+$EstudiaM+$TrabEstM+$NTrabEstM+$TrabajaF+$EstudiaF+$TrabEstF+$NTrabEstF))*0.75;
$etiqueta=(($TrabajaM+$EstudiaM+$TrabEstM+$NTrabEstM+$TrabajaF+$EstudiaF+$TrabEstF+$NTrabEstF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Actividad a la que se dedica actualmente'],
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
      'categories' => ['Trabaja', 'Estudia', 'Trabaja y estudia','No trabaja ni estudia'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$TrabajaM+$TrabajaF,+$EstudiaM+$EstudiaF,$TrabEstM+$TrabajaF,$NTrabEstM+$NTrabEstF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],*/


      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$TrabajaF ,$EstudiaF,$NTrabEstF,$NTrabEstF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$TrabajaM,$EstudiaM,$TrabajaM,$NTrabEstM]],
   ]
]
]);

//Gráfica 2
$EspecM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$MaestM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$DocM      =0+ RepetitivasEgresados::getRepet("EGRTIT",2,'M','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$IdiomasM  =0+ RepetitivasEgresados::getRepet("EGRTIT",3,'M','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$OtrosM    =0+ RepetitivasEgresados::getRepet("EGRTIT",4,'M','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$EspecF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$MaestF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$DocF      =0+ RepetitivasEgresados::getRepet("EGRTIT",2,'F','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$IdiomasF  =0+ RepetitivasEgresados::getRepet("EGRTIT",3,'F','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$OtrosF    =0+ RepetitivasEgresados::getRepet("EGRTIT",4,'F','rep_egr_estudia',$model->carrera, $model->periodo,$multicarrera);
$PorcentajeEsperado=(($EspecM+$MaestM+$DocM+$IdiomasM+$OtrosM+$EspecF+$MaestF+$DocF+$IdiomasF+$OtrosF))*0.75;
$etiqueta=(($EspecM+$MaestM+$DocM+$IdiomasM+$OtrosM+$EspecF+$MaestF+$DocF+$IdiomasF+$OtrosF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => 'Si estudia, indicar si es:'],
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
          'categories' => ['Especialidad', 'Maestría', 'Doctorado','Idiomas','Otro'],
          'min'=>0,
          'max'=>3,
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$EspecF+$EspecM,$MaestM+$MaestF,$DocF+$DocM,$IdiomasF+$IdiomasM,$OtrosF+$OtrosM]],
        /*
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
        */

          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$EspecF ,$MaestF,$DocF,$IdiomasF,$OtrosF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$EspecM ,$MaestM,$DocM,$IdiomasM,$OtrosM]],
       ]
    ]
    ]);



$MaloM       =0+ Pertinencia::getCaldoc("EGRTIT",0,'M','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$RegularM    =0+ Pertinencia::getCaldoc("EGRTIT",1,'M','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$BuenoM      =0+ Pertinencia::getCaldoc("EGRTIT",2,'M','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$MbuenoM     =0+ Pertinencia::getCaldoc("EGRTIT",3,'M','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$MaloF       =0+ Pertinencia::getCaldoc("EGRTIT",0,'F','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$RegularF    =0+ Pertinencia::getCaldoc("EGRTIT",1,'F','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$BuenoF      =0+ Pertinencia::getCaldoc("EGRTIT",2,'F','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$MbuenoF     =0+ Pertinencia::getCaldoc("EGRTIT",3,'F','per_tiempo_tran_prim_emp_id',$model->carrera, $model->periodo,$multicarrera);
$PorcentajeEsperado=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.75;
$etiqueta=(($MbuenoM+$BuenoM+$RegularM+$MaloM+$MbuenoF+$BuenoF+$RegularF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'En caso de trabajar: Tiempo transcurrido para obtener el primer empleo'],
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
      'categories' => ['Más de un año', 'Entre seis meses y un año', 'Menos de seis meses','Antes de egresar'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MbuenoM+$MbuenoF,$BuenoM+$BuenoF,$RegularM+$RegularF,$MaloM+$MaloF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */

      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MbuenoF,$BuenoF,$RegularF,$MaloF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MbuenoM,$BuenoM,$RegularM,$MaloM]],
   ]
]
]);


$BolsaTraM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$ContPersM    =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$ResiProfM    =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$MoDualM      =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$MedComM      =0+ InformacionLaboral::getInflab("EGRTIT",5,'M','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$OtrosM       =0+ InformacionLaboral::getInflab("EGRTIT",6,'M','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$BolsaTraF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$ContPersF    =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$ResiProfF    =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$MoDualF      =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$MedComF      =0+ InformacionLaboral::getInflab("EGRTIT",5,'F','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$OtrosF       =0+ InformacionLaboral::getInflab("EGRTIT",6,'F','inf_lab_medio_em_id',$model->carrera, $model->periodo,$multicarrera);
$PorcentajeEsperado=(($BolsaTraM+$ContPersM+$ResiProfM+$MoDualM+$MedComM+$OtrosM+$BolsaTraF+$ContPersF+$ResiProfF+$MoDualF+$MedComF+$OtrosF))*0.75;
$etiqueta=(($BolsaTraM+$ContPersM+$ResiProfM+$MoDualM+$MedComM+$OtrosM+$BolsaTraF+$ContPersF+$ResiProfF+$MoDualF+$MedComF+$OtrosF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Medio para obtener el empleo'],
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
      'categories' => ['Bolsa de trabajo del plantel', 'Contactos personales', 'Residencias profesionales','Modelo dual','Medios de comunicación','Otros'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$BolsaTraM+$BolsaTraF,+$ContPersM+$ContPersF,$ResiProfM+$ResiProfF,$MoDualM+$MoDualF,$MedComM+$MedComF,$OtrosM+$OtrosF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */

      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$BolsaTraF,$ContPersF,$ResiProfF,$MoDualF,$MedComF,$OtrosF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$BolsaTraM,$ContPersM,$ResiProfM,$MoDualM,$MedComM,$OtrosM]],
   ]
]
]);

//Gráfica 2
 $CompLabM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $TitProfM    =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $ExSelecM    =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $IdioExM     =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $ActiHabM    =0+ InformacionLaboral::getInflab("EGRTIT",5,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $CertifM     =0+ InformacionLaboral::getInflab("EGRTIT",6,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $NingM       =0+ InformacionLaboral::getInflab("EGRTIT",7,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $OtrosM      =0+ InformacionLaboral::getInflab("EGRTIT",8,'M','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $CompLabF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $TitProfF    =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $ExSelecF    =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $IdioExF     =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $ActiHabF    =0+ InformacionLaboral::getInflab("EGRTIT",5,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $CertifF     =0+ InformacionLaboral::getInflab("EGRTIT",6,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $NingF       =0+ InformacionLaboral::getInflab("EGRTIT",7,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $OtrosF      =0+ InformacionLaboral::getInflab("EGRTIT",8,'F','inf_lab_requisitos_con_id',$model->carrera, $model->periodo,$multicarrera);
 $PorcentajeEsperado=(($CompLabM+$TitProfM+$ExSelecM+$IdioExM+$ActiHabM+$CertifM+$NingM+$OtrosM+$CompLabF+$TitProfF+$ExSelecF+ $IdioExF+$ActiHabF+$CertifF+$NingF+$OtrosF))*0.75;
 $etiqueta=(($CompLabM+$TitProfM+$ExSelecM+$IdioExM+$ActiHabM+$CertifM+$NingM+$OtrosM+$CompLabF+$TitProfF+$ExSelecF+ $IdioExF+$ActiHabF+$CertifF+$NingF+$OtrosF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
 'options' => [
    'title' => ['text' => 'Requisitos de contratación'],
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
       'categories' => ['Competencias laborales', 'Título profesional', 'Examen de selección','Idioma extranjero','Actitudes y habilidades socio-comunicativas (principios y valores)','Certificaciones','Ninguno','Otro'],
       'min'=>0,
       'max'=>3,
    ],
    'yAxis' => [
       'title' => ['text' => 'incidencia']
    ],
    'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$CompLabM+$CompLabF,$TitProfM+$TitProfF,$ExSelecM+$ExSelecF,$IdioExM+$IdioExF,$ActiHabM+$ActiHabF,$CertifM+$CertifF,$NingM+$NingF,$OtrosM+$OtrosF]],
        
        /*
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
        */

       ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$CompLabF,$TitProfF,$ExSelecF,$IdioExF,$ActiHabF,$CertifF,$NingF,$OtrosF]],  
       ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$CompLabM,$TitProfM,$ExSelecM,$IdioExM,$ActiHabM,$CertifM,$NingM,$OtrosM]],
    ]
 ]
]);

//Gráfica 7: 
$IngM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$FrancM  =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$AlemM   =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$JapM    =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$EspM    =0+ InformacionLaboral::getInflab("EGRTIT",5,'M','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$OtrosM  =0+ InformacionLaboral::getInflab("EGRTIT",6,'M','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$IngF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$FrancF  =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$AlemF   =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$JapF    =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$EspF    =0+ InformacionLaboral::getInflab("EGRTIT",5,'F','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);
$OtrosF  =0+ InformacionLaboral::getInflab("EGRTIT",6,'F','inf_lab_idiomas_trabajo_id',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($IngM +$FrancM  +$AlemM   +$JapM   +$EspM   +$OtrosM +$IngF   +$FrancF +$AlemF +$JapF  +$EspF  +$OtrosF))*0.75;
$etiqueta=(($IngM +$FrancM  +$AlemM   +$JapM   +$EspM   +$OtrosM +$IngF   +$FrancF +$AlemF +$JapF  +$EspF  +$OtrosF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Idioma que utiliza en su trabajo'],
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
      'categories' => ['Inglés','Francés', 'Alemán', 'Japonés','Español','Otros'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$IngM+$IngF,+$FrancM+$FrancF,$AlemM+$AlemF,$JapM+$JapF,$EspM+$EspF,$OtrosM+$OtrosF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$IngF,$FrancF,$AlemF,$JapF,$EspF,$OtrosF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$IngM,$FrancM,$AlemM,$JapM,$EspM,$OtrosM]],
   ]
]
]);

//Gráfica 5:
$Men5M     =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Ent5y7M   =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Ent8y10M  =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Mas10M    =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Men5F     =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Ent5y7F   =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Ent8y10F  =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);
$Mas10F    =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_ingreso_salario_id',$model->carrera, $model->periodo,$multicarrera);


$PorcentajeEsperado=(($Men5M+$Ent5y7M+$Ent8y10M+$Mas10M+$Men5F+$Ent5y7F+$Ent8y10F+$Mas10F))*0.75;
$etiqueta=(($Men5M+$Ent5y7M+$Ent8y10M+$Mas10M+$Men5F+$Ent5y7F+$Ent8y10F+$Mas10F))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Ingreso (salario mínimo diario)'],
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
      'categories' => ['Menos de cinco', 'Entre cinco y siete', 'Entre ocho y diez','Más de diez'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$Men5M+$Men5F,$Ent5y7M+$Ent5y7F,$Ent8y10M+$Ent8y10F,$Mas10M+$Mas10F]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
*/

      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$Men5F,$Ent5y7F,$Ent8y10F,$Mas10F]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$Men5M,$Ent5y7M,$Ent8y10M,$Mas10M]],
   ]
]
]);

//Gráfica 
 $TecM      =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $SupervM   =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $JeareaM   =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $FuncM     =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $DirectM   =0+ InformacionLaboral::getInflab("EGRTIT",5,'M','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $EmprM     =0+ InformacionLaboral::getInflab("EGRTIT",6,'M','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $TecF      =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $SupervF   =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $JeareaF   =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $FuncF     =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $DirectF   =0+ InformacionLaboral::getInflab("EGRTIT",5,'F','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $EmprF     =0+ InformacionLaboral::getInflab("EGRTIT",6,'F','inf_lab_nivel_jer_id',$model->carrera, $model->periodo,$multicarrera);
 $PorcentajeEsperado=(($TecM+$SupervM+$JeareaM +$FuncM+$DirectM+$EmprM+$TecF+$SupervF+$JeareaF+$FuncF+$DirectF+$EmprF ))*0.75;
 $etiqueta=(($TecM+$SupervM+$JeareaM +$FuncM+$DirectM+$EmprM+$TecF+$SupervF+$JeareaF+$FuncF+$DirectF+$EmprF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
 'options' => [
    'title' => ['text' => 'Nivel jerárquico en el trabajo'],
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
       'categories' => ['Técnico(a)', 'Supervisor(a)', 'Jefe(a) de área','Funcionario(a)','Directivo(a)','Empresario(a)'],
       'min'=>0,
       'max'=>3,
    ],
    'yAxis' => [
       'title' => ['text' => 'incidencia']
    ],
    'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$TecM+$TecF,$SupervM+$SupervF,$JeareaM+$JeareaF,$FuncM+$FuncF,$DirectM+$DirectF,$EmprM+$EmprF]],
        /*
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
        */

       ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$TecF,$SupervF,$JeareaF,$FuncF,$DirectF,$EmprF]],  
       ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$TecM,$SupervM,$JeareaM,$FuncM,$DirectM,$EmprM]],
    ]
 ]
]);


//
$BasM     =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$EventM   =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$ContrM   =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$OtroM    =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$BasF     =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$EventF   =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$ContrF   =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);
$OtroF    =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_cond_tra_id',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($BasM+$EventM+$ContrM+$OtroM+$BasF+$EventF+$ContrF+$OtroF))*0.75;
$etiqueta=(($BasM+$EventM+$ContrM+$OtroM+$BasF+$EventF+$ContrF+$OtroF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Condición de trabajo'],
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
      'categories' => ['Base', 'Eventual', 'Contrato','Otro'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$BasM+$BasF,$EventM+$EventF,$ContrM+$ContrF,$OtroM+$OtroF]],
    
/*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],

    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$BasF,$EventF,$ContrF,$OtroF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$BasM,$EventM,$ContrM,$OtroM]],
   ]
]
]);

?>

<h1>DESEMPEÑO PROFESIONAL DE LOS EGRESADOS</h1>

    <?php

//Gráfica 
$MefM    =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$EficM   =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$PeficM  =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$DefM    =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$MefF    =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$EficF   =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$PeficF  =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);
$DefF    =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_efi_rea_act',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MefM+$EficM+$PeficM+$DefM+$MefF+$EficF+$PeficF+$DefF))*0.75;
$etiqueta=(($MefM+$EficM+$PeficM+$DefM+$MefF+$EficF+$PeficF+$DefF))*0.80;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Eficiencia para realizar las actividades laborales, en relación con su formación académica'],
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
      'categories' => ['Muy eficiente','Eficiente', 'Poco eficiente', 'Deficiente'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MefM+$MefF,$EficM+$EficF,$PeficM+$PeficF,$DefF+$DefM]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MefF,$EficF,$PeficF,$DefF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MefM,$EficM,$PeficM,$DefM]],
   ]
]
]);

//Gráfica
$ExcM    =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$BueM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$RegM    =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$MaloM   =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$ExcF    =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$BueF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$RegF    =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);
$MaloF   =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_com_cal_for_aca',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($ExcM+$BueM+$RegM+$MaloM+$ExcF +$BueF+$RegF+$MaloF))*0.75;
$etiqueta=(($ExcM+$BueM+$RegM+$MaloM+$ExcF +$BueF+$RegF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Cómo califica su formación académica con respecto a su desempeño laboral'],
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
      'categories' => ['Excelente','Bueno', 'Regular', 'Malo'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$ExcM+$ExcF,$BueF+$BueM,$RegM+$RegF,$MaloM+$MaloF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],

    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$ExcF,$BueF,$RegF,$MaloF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$ExcM,$BueM,$RegM,$MaloM]],
   ]
]
]);

//Gráfica 10: 
$ExcM    =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$BueM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$RegM    =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$MaloM   =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$ExcF    =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$BueF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$RegF    =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);
$MaloF   =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_uti_res_pro',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($ExcM+$BueM+$RegM+$MaloM+$ExcF+$BueF+$RegF+$MaloF))*0.75;
$etiqueta=(($ExcM+$BueM+$RegM+$MaloM+$ExcF+$BueF+$RegF+$MaloF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional'],
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
      'categories' => ['Excelente','Bueno', 'Regular', 'Malo'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$ExcM+$ExcF,$BueM+$BueF,$RegM+$RegF,$MaloM+$MaloF]],
   
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
  */

      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$ExcF,$BueF,$RegF,$MaloF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$ExcM,$BueM,$RegM,$MaloM]],
   ]
]
]);

//Gráfica 6: Hecha por Luisa
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_rel_for',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM+$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM+$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Relación del trabajo con su área de formación'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
  */

      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

?>
<h3>De los siguientes aspectos, ¿Qué grado de importancia valoró la empresa para tu contratación como egresado? </h3>
<?php

//Gráfica 11
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_are_cam_est',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM+$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM+$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Área o Campo de Estudio'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
  */

      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 12
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_titulacion',$model->carrera, $model->periodo,$multicarrera);


$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Titulación'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    
    /*

    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 13:
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_exp_lab',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Experiencia Laboral / práctica (antes de egresar)'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 14: 
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_com_lab',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Competencia laboral: Habilidad para resolver problemas, capacidad de análisis, habilidad para el aprendizaje, creatividad, administración del tiempo, capacidad de negociación, habilidades manuales, trabajo en equipo, iniciativa, honestidad, persistencia, etc.'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],

    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],

    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 15:
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_pos_int_egre',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Posicionamiento de la Institución de egreso'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 16:
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_con_idio_ext',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Conocimiento de Idiomas Extranjeros'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 17
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_rec_ref',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Recomendaciones / referencias'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],

    */
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 18:
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_per_act',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Personalidad / actitudes'],
   'annotations'=> [[
    'labelOptions'=> [
        'backgroundColor'=> 'rgba(73,127, 67,0.8)',
        'verticalAlign'=> 'top'
    ],
    
    /*
    'labels'=> [[
        'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
        'text'=> 'Porcentaje esperado: '.$etiqueta
    ]]
    */
]],
   'xAxis' => [
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],*/


    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

//Gráfica 19: Hecha por Luisa
$MpocoM   =0+ InformacionLaboral::getInflab("EGRTIT",0,'M','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$PocoM    =0+ InformacionLaboral::getInflab("EGRTIT",1,'M','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$RegM     =0+ InformacionLaboral::getInflab("EGRTIT",2,'M','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$SufM     =0+ InformacionLaboral::getInflab("EGRTIT",3,'M','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$MuchoM   =0+ InformacionLaboral::getInflab("EGRTIT",4,'M','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$MpocoF   =0+ InformacionLaboral::getInflab("EGRTIT",0,'F','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$PocoF    =0+ InformacionLaboral::getInflab("EGRTIT",1,'F','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$RegF     =0+ InformacionLaboral::getInflab("EGRTIT",2,'F','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$SufF     =0+ InformacionLaboral::getInflab("EGRTIT",3,'F','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);
$MuchoF   =0+ InformacionLaboral::getInflab("EGRTIT",4,'F','inf_lab_cap_lid',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.75;
$etiqueta=(($MpocoM+$PocoM +$RegM+$SufM+$MuchoM+$MpocoF+$PocoF+$RegF+$SufF+$MuchoF))*0.80;


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
'options' => [
   'title' => ['text' => 'Capaidad de liderazgo'],
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
      'categories' => ['Muy poco', 'Poco', 'Regular','Suficiente','Mucho'],
      'min'=>0,
      'max'=>3,
   ],
   'yAxis' => [
      'title' => ['text' => 'incidencia']
   ],
   'series' => [
    
    /*
    ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],
  */

    ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$MpocoM+$MpocoF,$PocoM+$PocoF,$RegM+$RegF,$SufM+$SufF,$MuchoM+$MuchoF]],
      ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$MpocoF,$PocoF,$RegF,$SufF,$MuchoF]],  
      ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$MpocoM,$PocoM,$RegM,$SufM,$MuchoM]],
   ]
]
]);

?>
</p>

<h1>EXPECTATIVAS DE DESARROLLO, SUPERACIÓN PROFESIONAL Y DE ACTUALIZACIÓN</h1>
<?php
//Gráfica 3
$SiM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_cur_act',$model->carrera, $model->periodo,$multicarrera);
$NoM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_cur_act',$model->carrera, $model->periodo,$multicarrera);
$SiF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_cur_act',$model->carrera, $model->periodo,$multicarrera);
$NoF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_cur_act',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($SiM+$NoM+$SiF+$NoF))*0.75;
$etiqueta=(($SiM+$NoM+$SiF+$NoF))*0.80;

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Le gustaría tomar cursos de actualización?'],
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
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
       
        /*
        ['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]],*/


          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);

//Gráfica 4
$SiM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_posgrado',$model->carrera, $model->periodo,$multicarrera);
$NoM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_posgrado',$model->carrera, $model->periodo,$multicarrera);
$SiF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_posgrado',$model->carrera, $model->periodo,$multicarrera);
$NoF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_posgrado',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($SiM+$NoM+$SiF+$NoF))*0.75;
$etiqueta=(($SiM+$NoM+$SiF+$NoF))*0.80;

$linea_esperado=array();
$texto_esperado=array();
if($bol_esperado){
    $linea_esperado=['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]];
    $texto_esperado= [[
            'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
            'text'=> 'Porcentaje esperado: '.$etiqueta
        ]];
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Le gustaría tomar algún posgrado?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ],
        'labels'=> [[
            'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
            'text'=> 'Porcentaje esperado: '.$etiqueta
        ]]
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
        $linea_esperado,
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}else{
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Le gustaría tomar algún posgrado?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ]
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}


?>

<h1>PARTICIPACIÓN SOCIAL DE LOS EGRESADOS</h1>
<?php
//Gráfica 5
$SiM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_per_org_soc',$model->carrera, $model->periodo,$multicarrera);
$NoM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_per_org_soc',$model->carrera, $model->periodo,$multicarrera);
$SiF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_per_org_soc',$model->carrera, $model->periodo,$multicarrera);
$NoF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_per_org_soc',$model->carrera, $model->periodo,$multicarrera);

$PorcentajeEsperado=(($SiM+$NoM+$SiF+$NoF))*0.75;
$etiqueta=(($SiM+$NoM+$SiF+$NoF))*0.80;

$linea_esperado=array();
$texto_esperado=array();
if($bol_esperado){
    $linea_esperado=['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]];
    $texto_esperado=[[
            'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
            'text'=> 'Porcentaje esperado: '.$etiqueta
        ]];
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Pertenece a organizaciones sociales?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ],
        'labels'=> $texto_esperado
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
        $linea_esperado,
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}else{
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Pertenece a organizaciones sociales?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ]
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}



    //Gráfica 6
$SiM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_per_org_prof',$model->carrera, $model->periodo,$multicarrera);
$NoM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_per_org_prof',$model->carrera, $model->periodo,$multicarrera);
$SiF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_per_org_prof',$model->carrera, $model->periodo,$multicarrera);
$NoF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_per_org_prof',$model->carrera, $model->periodo,$multicarrera);
$PorcentajeEsperado=(($SiM+$NoM+$SiF+$NoF))*0.75;
$etiqueta=(($SiM+$NoM+$SiF+$NoF))*0.80;

$linea_esperado=array();
$texto_esperado=array();
if($bol_esperado){
    $linea_esperado=['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]];
    $texto_esperado=[[
            'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
            'text'=> 'Porcentaje esperado: '.$etiqueta
        ]];
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Pertenece a organismos de profesionistas?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ],
        'labels'=> $texto_esperado
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
        $linea_esperado,
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}else{
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Pertenece a organismos de profesionistas?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ]       
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}


  //Gráfica 7
$SiM    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'M','rep_egr_per_aso_egr',$model->carrera, $model->periodo,$multicarrera);
$NoM    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'M','rep_egr_per_aso_egr',$model->carrera, $model->periodo,$multicarrera);
$SiF    =0+ RepetitivasEgresados::getRepet("EGRTIT",0,'F','rep_egr_per_aso_egr',$model->carrera, $model->periodo,$multicarrera);
$NoF    =0+ RepetitivasEgresados::getRepet("EGRTIT",1,'F','rep_egr_per_aso_egr',$model->carrera, $model->periodo,$multicarrera);
$PorcentajeEsperado=(($SiM+$NoM+$SiF+$NoF))*0.75;
$etiqueta=(($SiM+$NoM+$SiF+$NoF))*0.80;
$linea_esperado=array();
$texto_esperado=array();
if($bol_esperado){
    $linea_esperado=['type'=> 'line','dataLabels'=>['enabled' => false],'enableMouseTracking'=> false,'marker'=>['enabled'=>false], 'color'=>'green', 'name'=>' 75 porciento esperado','data'=>[[-0.5,$PorcentajeEsperado] , [4,  $PorcentajeEsperado]]];
    $texto_esperado=[[
            'point'=> [ 'xAxis'=> 0,'yAxis'=> 0, 'x'=> 0, 'y'=>$etiqueta],
            'text'=> 'Porcentaje esperado: '.$etiqueta
        ]];
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Pertenece a la asociación de egresados?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ],
        'labels'=> $texto_esperado
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
            $linea_esperado,
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}else{
     echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/annotations'
    ],
    'options' => [
       'title' => ['text' => '¿Pertenece a la asociación de egresados?'],
       'annotations'=> [[
        'labelOptions'=> [
            'backgroundColor'=> 'rgba(73,127, 67,0.8)',
            'verticalAlign'=> 'top'
        ]       
    ]],
       'xAxis' => [
          'categories' => ['Sí','No'],
       ],
       'yAxis' => [
          'title' => ['text' => 'incidencia']
       ],
       'series' => [
        ['type' => 'column','color'=>'gray','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Total', 'data' => [$SiM+$SiF,$NoM+$NoF]],
          ['type' => 'column','color'=>'pink','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Mujeres', 'data' => [$SiF,$NoF]],  
          ['type' => 'column','dataLabels'=>['enabled' => true],'enableMouseTracking'=> false,'name' => 'Hombres', 'data' => [$SiM,$NoM]],
       ]
    ]
    ]);
}
