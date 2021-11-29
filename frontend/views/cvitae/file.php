<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Estudiantes;
use common\models\PerfilEgresado;
use common\models\InfAcademica;
use common\models\InformacionLaboral;
use common\models\RefProfesionales;
/* @var $this yii\web\View */
?>
<div id="containerCV">
<link rel="stylesheet"  href="<?=Url::to('@web/', true)?>css/cv.css">
<?php
$array=Estudiantes::getPersonalData(Yii::$app->session['usuario']);
$array2=PerfilEgresado::getPersonalData(Yii::$app->session['usuario']);
$array3=InfAcademica::getPersonalData(Yii::$app->session['usuario']);
$array4=InformacionLaboral::getProfesionalData(Yii::$app->session['usuario']);
$array5=RefProfesionales::getProfesionalData(Yii::$app->session['usuario']);


if(!empty($array)&&!empty($array2)){  
//echo $array[0]['est_foto']."<br>";
echo "<table id='header'><tr>";
echo "<td>";
echo '<span id="nombre">';
echo $array[0]['est_nombre_alumno']." ".$array[0]['est_apellido_paterno']." ".$array[0]['est_apellido_materno'];
echo "</span>";
echo "<br>Domicilio: ";
echo $array2[0]['per_egr_calle']." ".$array2[0]['per_egr_no']." ".$array2[0]['per_egr_colonia']." ".$array2[0]['mpio_nombre']." ".$array2[0]['edo_nombre']."<br>"; 
echo "Tel. fijo: ".$array2[0]['per_egr_tel_casa']."<br>";
echo "Tel. cel: ".$array2[0]['per_egr_tel_cel']."<br>";
echo "Correo electrónico: ".$array2[0]['per_egr_email'];
echo "<br>Fecha de nacimiento: ";
//procesamiento de la fecha de nacimiento apartir del curp
$cadena=$array[0]['est_curp_alumno'];
$cadena=substr($cadena, 4 ,6);
$día=substr($cadena, 3 ,2);
echo substr($cadena, 4 ,2)."-".substr($cadena, 2 ,2)."-".substr($cadena, 0 ,2);
}else{
    echo  "<span ><h4>Nota: Necesita ingresar datos personales para poder imprimir un Curriculum vitae</h4></span>";
   
}
echo "</td>";
echo "<td>";
if(!empty($array2)){
    if ($array2[0]['per_image_web_filename']!='') {
        echo '<img id="FotoP" src="'. 'uploads/perfiles/'.$array2[0]['per_img_scr_fname'].'">';
      }
}
echo "</td>";
echo "</tr></table>";
if(!empty($array3)){
  $vacio=true;
  foreach ($array3 as $row){
    if($row['tesc_nombre']=='Título' ||$row['tesc_nombre']=='Maestría' 
    ||$row['tesc_nombre']=='Doctorado' || $row['tesc_nombre']=='Especialidad' ||    
    $row['tesc_nombre']=='Licenciatura' || $row['tesc_nombre']=='Ingeniería' ||
    $row['tesc_nombre']=='Licenciatura (cursando)' || $row['tesc_nombre']=='Ingeniería (cursando)'){
        $vacio=false;
    }

  }
  if(!$vacio){
    echo '<div id="division">';
    echo "Información académica";
    echo "</div>";
    echo "
    <table id='InfAcadTable'>
    <tr>
      <th>Periodo</th>
      <th>Especialidad</th>
      <th>Institución</th>
      <th>Código de registro</th>
    </tr>
      ";
foreach ($array3 as $row){
    if($row['tesc_nombre']=='Título' ||$row['tesc_nombre']=='Maestría' 
    ||$row['tesc_nombre']=='Doctorado' || $row['tesc_nombre']=='Especialidad' ||    
    $row['tesc_nombre']=='Licenciatura' || $row['tesc_nombre']=='Ingeniería' ||
    $row['tesc_nombre']=='Licenciatura (cursando)' || $row['tesc_nombre']=='Ingeniería (cursando)'){
        $vacio=false;
    echo "<tr>";
echo "<td>";
echo date('Y',strtotime($row['infac_fechini']))." - ".date('Y',strtotime($row['infac_fechfin']));
echo "</td>";
echo "<td>";
echo $row['tesc_nombre']." en: ".$row['infac_disiplina'];
echo "</td>";
echo "<td>";
echo $row['infes_nmbre'];
echo "</td>";
echo "<td>";
echo $row['infac_registro']."<br>";
echo "</td>";
echo "</tr>";
    }    
}

echo "</table> ";
  }

}

if(!empty($array2)){

if($array2[0]['per_egr_ingles']==0){
    $valoringles="0%";
}
if($array2[0]['per_egr_ingles']==1){
    $valoringles="25%";
}
if($array2[0]['per_egr_ingles']==2){
    $valoringles="50%";
}
if($array2[0]['per_egr_ingles']==3){
    $valoringles="75%";
}
if($array2[0]['per_egr_ingles']==4){
    $valoringles="100%";
}
echo "<br>Idioma inglés: ".$valoringles."<br>"; 
}
/*aquí comienza el sistema de  cursos y certificaciones */
if(!empty($array3)){
    $vacio=true;  

      foreach ($array3 as $row){
        if($row['tesc_nombre']=='Diploma' ||$row['tesc_nombre']=='Reconocimiento' ||
        $row['tesc_nombre']=='Certificación')
        {
            $vacio=false;  
        }
    }
    if(!$vacio){
        echo '<div id="division">';
        echo "Cursos y certificaciones";
        echo "</div>";
        echo "
        <table id='InfAcadTable'>
        <tr>
          <th>Periodo</th>
          <th>Especialidad</th>
          <th>Institución</th>
          <th>Código de registro</th>
        </tr>
          ";
foreach ($array3 as $row){
    
    if($row['tesc_nombre']=='Diploma' ||$row['tesc_nombre']=='Reconocimiento' ||
    $row['tesc_nombre']=='Certificación')
    {

    echo "<tr>";
echo "<td>";
echo date('Y',strtotime($row['infac_fechini']))." - ".date('Y',strtotime($row['infac_fechfin']));
echo "</td>";
echo "<td>";
echo $row['tesc_nombre']." en: ".$row['infac_disiplina'];
echo "</td>";
echo "<td>";
echo $row['infes_nmbre'];
echo "</td>";
echo "<td>";
echo $row['infac_registro']."<br>";
echo "</td>";
echo "</tr>";
    }
}
echo "</table> ";
 }
 }
//para cursos impartidos

if(!empty($array3)){
    $vacio=true;  

      foreach ($array3 as $row){
        if($row['tesc_nombre']=='Curso impartido'){
            $vacio=false;
        }
    }
    if(!$vacio){
    echo '<div id="division">';
    echo "Cursos impartidos";
    echo "</div>";
    echo "
    <table id='InfAcadTable'>
    <tr>
      <th>Periodo</th>
      <th>Especialidad</th>
      <th>Institución</th>
      <th>Código de registro</th>
    </tr>
      ";
foreach ($array3 as $row){
    if($row['tesc_nombre']=='Curso impartido'){
    echo "<tr>";
echo "<td>";
//date('M d Y',strtotime($item['opened']))
echo date('Y',strtotime($row['infac_fechini']))." - ".date('Y',strtotime($row['infac_fechfin']));
echo "</td>";
echo "<td>";
echo $row['tesc_nombre']." en: ".$row['infac_disiplina'];
echo "</td>";
echo "<td>";
echo $row['infes_nmbre'];
echo "</td>";
echo "<td>";
echo $row['infac_registro']."<br>";
echo "</td>";
echo "</tr>";
    }
}
echo "</table> ";
 }
}
 if(!empty($array4)){
echo '<div id="division">';
echo "Experiencia profesional</div>";
echo "
<table id='InfAcadTable'>
<tr>
  <th>Periodo</th>
  <th>Cargo</th>
  <th>Empresa</th>
</tr>
  ";
if(!empty($array4)){
foreach ($array4 as $row){
    echo "<tr>";
    echo "<td>";
    echo date('Y',strtotime($row['inf_lab_fecha_ing_emp']))." - ".date('Y',strtotime($row['ing_lab_fecha_ter_emp']));
    echo "</td>";
    echo "<td>";
    //procesanmiento de sexo del puesto por Luisa y jesús
    if(Yii::$app->session['sexo']=='F'){
    $valorBruto=$row['nivel_jer_nombre'];
    $indice1=strpos($valorBruto,"(a)");
    //$rest = substr("abcdef", 2, -1);  // devuelve "cde"
    $caracterA=substr($valorBruto, $indice1-1 , 1);
    //echo $caracterA;

    switch($caracterA){
        case 'e':
        $valorBruto=substr_replace($valorBruto, 'a', $indice1-1, 1);
        $valorBruto=substr_replace($valorBruto, '', $indice1,3);
        break;
        case 'o':
        $valorBruto=substr_replace($valorBruto, 'a', $indice1-1, 1);
        $valorBruto=substr_replace($valorBruto, '', $indice1,3);
        break;
        default:
        $valorBruto=substr_replace($valorBruto, '', $indice1,3);
        $valorBruto=substr_replace($valorBruto, 'a', $indice1,0);
        break;
    }
    //
    echo $valorBruto;
}else{
    $valorBruto=$row['nivel_jer_nombre'];
    $indice1=strpos($valorBruto,"(a)");
    //$rest = substr("abcdef", 2, -1);  // devuelve "cde"
    //echo $caracterA;
    $valorBruto=substr_replace($valorBruto, '', $indice1,3);
    //
    echo $valorBruto;
}

    echo "</td>";
    echo "<td>";
    echo $row['emp_razon_social'];
    echo "</td>";
    echo "</tr>";
    }
    echo "</table> ";
}
 }
 if(!empty($array2)){
    echo '<div id="division">';
    echo "Habilidades en informática</div>";
echo "<p>".$array2[0]['per_egr_paq_com']."</p>";
 }
 if(!empty($array5)){
//sección de referencias profesionales
echo '<div id="division">';
echo "Referencias profesionales";
echo "</div>";
echo "
<table id='InfAcadTable'>
<tr>
  <th>Nombre</th>
  <th>Correo electrónico</th>
  <th>No. de teléfono</th>
  <th>Ocupación</th>
</tr>
  ";
foreach ($array5 as $row){
    
    echo "<tr>";
echo "<td>";
echo $row['ref_nombres'];
echo "</td>";
echo "<td>";
echo $row['ref_email'];
echo "</td>";
echo "<td>";
echo $row['ref_no_cel'];
echo "</td>";
echo "<td>";
echo $row['ref_ocupacion'];
echo "</td>";
echo "</tr>";
    
}

echo "</table> ";
 }
/*
ESto es lo que necesito para crear el curriculum vitae
DATOS PERSONALES
Fotografía
Nombre apellidos
calle, municipio, estado 
fecha de nacimiento
número de teléfono
correo electrónico
FORMACION ACADÉMICA
nombre escuela, carrera fecha
IDIOMAS
*//*
Corrección de imagenes mPDF
https://plugins.db-dzine.com/woocommerce-pdf-catalog/faq/images-pdf-displays-red-cross-https-mpdf/
Some nginx server disallow some agents in the CURL header. Therefore you will need to change the header. Go to plugin-folder/includes/mpdf/mpdf.php > Line: 12965.

Then change the CURLOPT_USERAGENT value to ‘User-Agent: curl/7.39.0’

Example:

curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: curl/7.39.0');
*/
?>
</div>