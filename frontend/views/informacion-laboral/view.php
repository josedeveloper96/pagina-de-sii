<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Empresas;
use common\models\RequisitosCont;
use common\models\MedioEm;
use common\models\NivelJer;
use common\models\Ingreso;
use common\models\CondTra;
use common\models\IdiomasTrabajo;
/* @var $this yii\web\View */
/* @var $model app\models\InformacionLaboral */

$this->title = 'Datos registrados:';
//$this->params['breadcrumbs'][] = ['label' => 'Informacion Laborals', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-laboral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->inf_lab_id], ['class' => 'btn btn-primary']) ?>       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'inf_lab_fecha_ing_emp',
            'ing_lab_fecha_ter_emp',
            'inf_lab_nombre_ji',
            'inf_lab_puesto_ji',
            'inf_lab_telefono_ji',
            'inf_lab_ext_ji',
            'inf_lab_email_ji:email',
            'inf_lab_no_de_control',
            //'inf_lab_empresa_id',
            [
                'attribute' => 'inf_lab_empresa_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelS=Empresas::findByID($model->inf_lab_empresa_id);
                   return $modelS->emp_razon_social;
                },
               ],    
            //'inf_lab_medio_em_id',
            [
                'attribute' => 'inf_lab_medio_em_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelr=MedioEm::findByID($model->inf_lab_medio_em_id);
                   return $modelr->medio_em_nombre;
                },
               ],     
            'inf_lab_otro_medio_em',
            //'inf_lab_requisitos_con_id',
            [
                'attribute' => 'inf_lab_requisitos_con_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelm=RequisitosCont::findByID($model->inf_lab_requisitos_con_id);
                   return $modelm->requisito_cont_nombre;
                },
               ],    
            'inf_lab_otro_requisitos_con:ntext',
            [
                'attribute' => 'inf_lab_nivel_jer_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelj=NivelJer::findByID($model->inf_lab_nivel_jer_id);
                   return $modelj->nivel_jer_nombre;
                },
               ], 
            //'inf_lab_nivel_jer_id',
            //'inf_lab_ingreso_salario_id',
            [
                'attribute' => 'inf_lab_ingreso_salario_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelj=Ingreso::findByID($model->inf_lab_ingreso_salario_id);
                   return $modelj->ingreso_nombre;
                },
               ], 
               //CondTra
            //'inf_lab_cond_tra_id',
            [
                'attribute' => 'inf_lab_cond_tra_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelj=CondTra::findByID($model->inf_lab_cond_tra_id);
                   return $modelj->cond_tra_nombre;
                },
               ], 
            'inf_lab_otro_cond_tra',            
            //'inf_lab_rel_for',
            [
                'attribute' => 'inf_lab_rel_for',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_rel_for){
                        case '0';
                        return '0%';
                        break;
                        case '1';
                        return '20%';
                        break;
                        case '2';
                        return '40%';
                        break;
                        case '3';
                        return '60%';
                        break;
                        case '4';
                        return '80%';
                        break;
                        case '5';
                        return '100%';
                        break;
                    }                   
                },
               ],             
            //'inf_lab_idiomas_trabajo_id',
            [
                'attribute' => 'inf_lab_idiomas_trabajo_id',
                'format' => 'raw',
                'value' => function ($model) {   
                    $modelj=IdiomasTrabajo::findByID($model->inf_lab_idiomas_trabajo_id);
                   return $modelj->idioma_tbj_nombre;
                },
               ], 
            'inf_lab_otro_idioma',
            'inf_lab_uso_ie_hablar',
            'inf_lab_uso_ie_escribir',
            'inf_lab_uso_ie_leer',
            'inf_lab_uso_ie_escuchar',
            //'inf_lab_efi_rea_act',
            [
                'attribute' => 'inf_lab_efi_rea_act',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_efi_rea_act){
                        case '0';
                        return 'Muy eficiente';
                        break;
                        case '1';
                        return 'Eficiente';
                        break;
                        case '2';
                        return 'Poco eficiente';
                        break;
                        case '3';
                        return 'Deficiente';
                        break;
                    }                   
                },
               ], 
            //'inf_lab_com_cal_for_aca',
            [
                'attribute' => 'inf_lab_com_cal_for_aca',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_com_cal_for_aca){
                        case '0';
                        return 'Excelente';
                        break;
                        case '1';
                        return 'Bueno';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Malo';
                        break;
                    }                   
                },
               ],
            //'inf_lab_uti_res_pro',
            [
                'attribute' => 'inf_lab_uti_res_pro',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_uti_res_pro){
                        case '0';
                        return 'Excelente';
                        break;
                        case '1';
                        return 'Bueno';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Malo';
                        break;
                    }                   
                },
               ],
            //'inf_lab_are_cam_est',
            [
                'attribute' => 'inf_lab_are_cam_est',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_are_cam_est){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],
            //'inf_lab_titulacion',
            [
                'attribute' => 'inf_lab_titulacion',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_titulacion){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],
            //'inf_lab_exp_lab',
            [
                'attribute' => 'inf_lab_exp_lab',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_exp_lab){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],
            //'inf_lab_com_lab',
            [
                'attribute' => 'inf_lab_com_lab',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_com_lab){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],
            //'inf_lab_pos_int_egre',
            [
                'attribute' => 'inf_lab_pos_int_egre',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_pos_int_egre){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],
            //'inf_lab_con_idio_ext',
            [
                'attribute' => 'inf_lab_con_idio_ext',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_con_idio_ext){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],
            //'inf_lab_rec_ref',
            [
                'attribute' => 'inf_lab_rec_ref',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_rec_ref){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],            
            //'inf_lab_per_act',
            [
                'attribute' => 'inf_lab_per_act',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_per_act){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],  
            //'inf_lab_cap_lid',
            [
                'attribute' => 'inf_lab_cap_lid',
                'format' => 'raw',
                'value' => function ($model) {   
                    switch($model->inf_lab_cap_lid){
                        case '0';
                        return 'Muy poco';
                        break;
                        case '1';
                        return 'poco';
                        break;
                        case '2';
                        return 'Regular';
                        break;
                        case '3';
                        return 'Suficiente';
                        break;
                        case '4';
                        return 'Mucho';
                        break;
                    }                   
                },
               ],  
            'inf_lab_fecha_registro',
        ],
    ]) ?>

</div>
