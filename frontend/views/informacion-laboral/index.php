<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
//para desplegar datos correctamente
use common\models\Empresas;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\informacionLaboralsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información laboral';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-laboral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Información laboral', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>
    <p>
    <?= Html::tag('h3', ' En caso de no existir registro de la empresa donde labora, favor de registrarla en la sección de empresas para futuros usos.<br>')?>
    <div> </div>

    </p>    



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'inf_lab_id',
            'inf_lab_fecha_ing_emp',
            'ing_lab_fecha_ter_emp',
            'inf_lab_nombre_ji',
          //  'inf_lab_puesto_ji',
            'inf_lab_telefono_ji',
            //'inf_lab_ext_ji',
            'inf_lab_email_ji:email',
            //'inf_lab_no_de_control',
            //'inf_lab_empresa_id',
            'infLabEmpresa.emp_razon_social',
            //'inf_lab_medio_em_id',
            //'inf_lab_otro_medio_em',
            //'inf_lab_requisitos_con_id',
            //'inf_lab_otro_requisitos_con:ntext',
            //'inf_lab_nivel_jer_id',
            //'inf_lab_ingreso_salario_id',
            //'inf_lab_cond_tra_id',
            //'inf_lab_otro_cond_tra',
            //'inf_lab_rel_for',
            //'inf_lab_idiomas_trabajo_id',
            //'inf_lab_otro_idioma',
            //'inf_lab_uso_ie_hablar',
            //'inf_lab_uso_ie_escribir',
            //'inf_lab_uso_ie_leer',
            //'inf_lab_uso_ie_escuchar',
            //'inf_lab_efi_rea_act',
            //'inf_lab_com_cal_for_aca',
            //'inf_lab_uti_res_pro',
            //'inf_lab_are_cam_est',
            //'inf_lab_titulacion',
            //'inf_lab_exp_lab',
            //'inf_lab_com_lab',
            //'inf_lab_pos_int_egre',
            //'inf_lab_con_idio_ext',
            //'inf_lab_rec_ref',
            //'inf_lab_per_act',
            //'inf_lab_cap_lid',
            //'inf_lab_fecha_registro',

            ['class' => ActionColumn::className(),'template'=>'{view} {update}'],
        ],
    ]); ?>
    <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-info']) ?>
</div>
