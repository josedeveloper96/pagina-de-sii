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
           
   if($session['rol']=="ACT"){
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
      <a class="navbar-brand" href="<?=  Url::to(['/site/estmain']); ?>"><?= Yii::$app->name ?></a>
    </div>   
      <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="<?=  Url::to(['/site/estmain']); ?>">Inicio</a></li>

          <li><a href="<?=  Url::to(['/solicitud-est-s-s/solicitud']); ?>">Servicio Social</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bolsa de Trabajo <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Anuncios de Trabajos</a></li>
            <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Mis Ofertas de Trabajo</a></li>
            <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Contactar Empresas</a></li>
            
            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/interes-laboral/paso1']); ?>">Inscribirme a la Bolsa de Trabajo</a></li>
          </ul>
         </li>
        
        
         <li><a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Perfil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Curriculum Vitae <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información Laboral</a></li>
            <li><a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a></li>
            <li><a href="<?=  Url::to(['/inf-academ/index']); ?>">Información Académica</a></li>
            
            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/cvitae/index']); ?>">Curriculum Vitae</a></li>
          </ul>
        </li>        
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
   }else if($session['rol']=="TIT" ||$session['rol']=="EGR"){
 
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
      <a class="navbar-brand" href="<?=  Url::to(['/site/egrmain']); ?>"><?= Yii::$app->name ?></a>
    </div>   
      <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="<?=  Url::to(['/site/egrmain']); ?>">Inicio</a></li>
        
         
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bolsa de Trabajo <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Anuncios de Trabajos</a></li>
            <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Mis Ofertas de Trabajo</a></li>
            <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Contactar Empresas</a></li>
            
            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/interes-laboral/paso1']); ?>">Inscribirme a la Bolsa de Trabajo</a></li>
          </ul>
         </li>
        
        
        
        <li><a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Perfil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Curriculum Vitae <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información Laboral</a></li>
            <li><a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a></li>
            <li><a href="<?=  Url::to(['/inf-academ/index']); ?>">Información Académica</a></li>
            
            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/cvitae/index']); ?>">Curriculum Vitae</a></li>
          </ul>
         </li> 
        <li><a href="<?=  Url::to(['/pertinencia/index']); ?>">Encuesta de Satisfacción</a></li>
                
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
   <?php } else if($session['rol']=="SEG"){ ?>

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
      <a class="navbar-brand" href="<?=  Url::to(['/site/segmain']); ?>"><?= Yii::$app->name ?></a>
    </div>   
      <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="<?=  Url::to(['/site/segmain']); ?>">Inicio</a></li>
        
         
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Seguimiento <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/segegresados/index']); ?>">Estudiantes y Egresados</a></li>
            <li><a href="<?=  Url::to(['/estadisticas-egresados/index']); ?>">Ver Estadisticos</a></li>

            

          </ul>
         </li>
        
        
        <!--
        <li><a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Perfil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Curriculum Vitae <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información Laboral</a></li>
            <li><a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a></li>
            <li><a href="<?=  Url::to(['/inf-academ/index']); ?>">Información Académica</a></li>
            
            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/cvitae/index']); ?>">Curriculum Vitae</a></li>
          </ul>
         </li> 
        <li><a href="<?=  Url::to(['/pertinencia/index']); ?>">Encuesta de Satisfacción</a></li>
         -->       
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

       <!--Menu-->
   <?php } else if($session['rol']=="GTV"){ ?>

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
                   <a class="navbar-brand" href="<?=  Url::to(['/site/segmain']); ?>"><?= Yii::$app->name ?></a>
               </div>
               <div class="collapse navbar-collapse" id="subenlaces">
                   <ul class="nav navbar-nav navbar-right">
                       <li><a href="<?=  Url::to(['/site/segmain']); ?>">Inicio</a></li>



                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Convenios <span class="caret"></span></a>
                           <ul class="dropdown-menu" role="menu">
                               <li><a href="<?=  Url::to(['/empresasgtv/index']); ?>">Empresas</a></li>
                               <li><a href="<?=  Url::to(['/estadisticas-egresados/index']); ?>">Convenios</a></li>



                           </ul>
                       </li>

                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Seguimiento <span class="caret"></span></a>
                           <ul class="dropdown-menu" role="menu">
                               <li><a href="<?=  Url::to(['/segegresados/index']); ?>">Estudiantes y Egresados</a></li>
                               <li><a href="<?=  Url::to(['/estadisticas-egresados/index']); ?>">Ver Estadisticos</a></li>



                           </ul>
                       </li>


                       <!--
        <li><a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Perfil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Curriculum Vitae <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información Laboral</a></li>
            <li><a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a></li>
            <li><a href="<?=  Url::to(['/inf-academ/index']); ?>">Información Académica</a></li>

            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/cvitae/index']); ?>">Curriculum Vitae</a></li>
          </ul>
         </li>
        <li><a href="<?=  Url::to(['/pertinencia/index']); ?>">Encuesta de Satisfacción</a></li>
         -->
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
 
   <?php } else if($session['rol']=="EMP"){ ?>

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
                   <a class="navbar-brand" href="<?=  Url::to(['/site/egrmain']); ?>"><?= Yii::$app->name ?></a>
               </div>
               <div class="collapse navbar-collapse" id="subenlaces">
                   <ul class="nav navbar-nav navbar-right">
                       <li><a href="<?=  Url::to(['/site/empmain']); ?>">Inicio</a></li>


                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bolsa de Trabajo <span class="caret"></span></a>
                           <ul class="dropdown-menu" role="menu">
                               <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Anuncios de Trabajos</a></li>
                               <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Mis Ofertas de Trabajo</a></li>
                               <li><a href="<?=  Url::to(['/interes-laboral/construccion']); ?>">Contactar Estudiantes</a></li>

                               <li class="divider"></li>
                               <li><a href="<?=  Url::to(['/interes-laboral/paso1']); ?>">Ver Curriculums Vite</a></li>
                           </ul>
                       </li>


                       <!--
        <li><a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Perfil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Curriculum Vitae <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información Laboral</a></li>
            <li><a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a></li>
            <li><a href="<?=  Url::to(['/inf-academ/index']); ?>">Información Académica</a></li>

            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/cvitae/index']); ?>">Curriculum Vitae</a></li>
          </ul>
         </li>
        <li><a href="<?=  Url::to(['/pertinencia/index']); ?>">Encuesta de Satisfacción</a></li>
         -->
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

   <?php } else if($session['rol']=="DAC"){ ?>

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
                   <a class="navbar-brand" href="<?=  Url::to(['/site/dacmain']); ?>"><?= Yii::$app->name ?></a>
               </div>
               <div class="collapse navbar-collapse" id="subenlaces">
                   <ul class="nav navbar-nav navbar-right">
                       <li><a href="<?=  Url::to(['/site/dacmain']); ?>">Inicio</a></li>


                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Seguimiento Egresados <span class="caret"></span></a>
                           <ul class="dropdown-menu" role="menu">
                               <li><a href="<?=  Url::to(['/segegresados/index']); ?>">Estudiantes y Egresados</a></li>
                               <li><a href="<?=  Url::to(['/estadisticas-egresados/index']); ?>">Ver Estadisticos</a></li>



                           </ul>
                       </li>

                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sistema Integral de Gestión <span class="caret"></span></a>
                           <ul class="dropdown-menu" role="menu">

                               <li><a href="<?=  Url::to(['/estadisticas-encuestas-servicio/index']); ?>">Ver Estadisticos Encuestas de Servicio</a></li>

                           </ul>
                       </li>


                       <!--
        <li><a href="<?=  Url::to(['/perfil-egresado/index']); ?>">Perfil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Curriculum Vitae <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=  Url::to(['/informacion-laboral/index']); ?>">Información Laboral</a></li>
            <li><a href="<?=  Url::to(['/ref-profesionales/index']); ?>">Referencias Profesionales</a></li>
            <li><a href="<?=  Url::to(['/inf-academ/index']); ?>">Información Académica</a></li>

            <li class="divider"></li>
            <li><a href="<?=  Url::to(['/cvitae/index']); ?>">Curriculum Vitae</a></li>
          </ul>
         </li>
        <li><a href="<?=  Url::to(['/pertinencia/index']); ?>">Encuesta de Satisfacción</a></li>
         -->
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

   <?php } ?>
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
