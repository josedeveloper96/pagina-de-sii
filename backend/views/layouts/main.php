

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use yii\helpers\Url;


//quitar la debug Toolbar
if (class_exists('yii\debug\Module')) { $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']); } 


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    
    <style>
        .salir{
          
            margin-top: 6px;
        }
        .navbaritr{
            position: relative;
            margin-top: -5px;
        }
        
    </style>
    
</head>

<body>
    
<main class="page">
    
    <img src="header.jpg" alt="TecNM/ITReynosa"  width="100%" border="0">   
   
<?php $this->beginBody() ?>
    <div class="wrap">            
<?php
   //recupero variables de sesion 
   $session = Yii::$app->session;          
   
   if(Yii::$app->user->isGuest){
       
   }else{
   
   
   if(Yii::$app->user->identity->role=="SAD"){
   ?>
     <!--Menu-->  
<nav  class="navbaritr navbar navbar-inverse sub-navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
        <span class="sr-only">Interruptor de Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>        
      <a class="navbar-brand" href="<?=  Url::to(['/site/index']); ?>"><?= Yii::$app->name ?></a>
    </div>   
      <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="<?=  Url::to(['/site/index']); ?>">Inicio</a></li>
        
     
        
         <li><a href="<?=  Url::to(['/user/index']); ?>">Usuario</a></li>
          <li><a href="<?=  Url::to(['/interes-laboral/index']); ?>">Interes Laboral</a></li>
          <li><a href="<?=  Url::to(['/correos-estudiantes/index']); ?>">Enviar Corroes a Estudiantes</a></li>
           
        <?php         
        if (Yii::$app->user->isGuest) {       
        ?>
        <li><a href="<?=  Url::to(['/site/login']); ?>">Entrar</a></li>
        <?php
        } else {            
            ?>
            <li>
                <?=
                   Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Salir (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-danger btn-sm salir']
            )
            . Html::endForm() 
                    ?>
            </li>
        
        <?php           
        }        
        ?> 
      </ul>
    </div>
  </div>
</nav> 
<!--Menu-->

   <?php 
   }else{
       ?>
        <!--Menu-->  
<nav  class="navbaritr navbar navbar-inverse sub-navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
        <span class="sr-only">Interruptor de Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>        
      <a class="navbar-brand" href="<?=  Url::to(['/site/index']); ?>"><?= Yii::$app->name ?></a>
    </div>   
      <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="<?=  Url::to(['/site/index']); ?>">Inicio</a></li>
        
     
        
        
           
        <?php         
        if (Yii::$app->user->isGuest) {       
        ?>
        <li><a href="<?=  Url::to(['/site/login']); ?>">Entrar</a></li>
        <?php
        } else {            
            ?>
            <li>
                <?=
                   Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Salir (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-danger btn-sm salir']
            )
            . Html::endForm() 
                    ?>
            </li>
        
        <?php           
        }        
        ?> 
      </ul>
    </div>
  </div>
</nav> 
<!--Menu-->
           
           
           <?php
   }
   
   }
 
?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>


        
</main>
    
 <!-- JS -->
 <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
    
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
