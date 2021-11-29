<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\InteresLaboral */


?>
<div class="interes-laboral-view">

   <h1>Curriculum vitae</h1>

    <p>'
        <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>
       
    </p>

        

            <?= \lesha724\documentviewer\GoogleDocumentViewer::widget([
      'url'=>'http://itreynosa.edu.mx/sii/frontend/web/cv/'.$model->inl_url_curriculum,//url на ваш документ 
      'width'=>'100%',
      'height'=>'1000px',
      //https://geektimes.ru/post/111647/
      'embedded'=>true,
      'a'=>\lesha724\documentviewer\GoogleDocumentViewer::A_BI //A_V = 'v', A_GT= 'gt', A_BI = 'bi'
]); ?>

    


   

</div>
