<?php

use common\models\InformacionLaboral;
use yii\web\Session;
use setasing\ftpd;
$session = Yii::$app->session;

//$path = Yii::getAlias("@vendor/setasing/fpdf/fpdf.php");
//require_once($path);

class PDF extends FPDF
{

  function Header()
  {

    $this->SetY(10);
    $this->SetX(10);
    $this->setFont('Arial','',10);
    $this->setFillColor(255,255,255);
    $this->cell(277,5,"ORDER OF PAYMENTS",0,1,'C',1); 
    $this->SetX(10);
    $this->cell(277,5,"FEDERAL BUREAU OF ARBITRATION",0,1,'C',1);  

  }

function Content($data)
{
   
  $y_axis_initial = 30;
  $row_height= 11;
  $y_axis = 24;
  $y_axis = $y_axis + $row_height;

  $i = 0;
  $a = 0;

  $max = 30;
  $row_height = 6;

  foreach ($data->models as $row)
  { 

    if ($i == $max)
     {
          $this->AddPage();
          $y_axis = 35;
          $i = 0;

      }
          $id = $row->inf_lab_id;
          $name = $row->inf_lab_nombre_ji;
          $amount = $row->inf_lab_no_de_control;
          $address = $row->inf_lab_puesto_ji;
          $email = $row->inf_lab_email_ji;

          $this->SetFillColor(232,232,232);
          $this->SetFont('Arial','',6);
          $this->SetY(28);
          $this->SetX(10);
          $this->Cell(20,7,'ID',1,0,'C',1);
          $this->Cell(90,7,'NAME',1,0,'C',1);
          $this->Cell(90,7,'ADDRESS',1,0,'C',1);
          $this->Cell(40,7,'EMAIL',1,0,'C',1);
          $this->Cell(40,7,'AMOUNT',1,0,'C',1);

          $this->SetFillColor(255,255,255);
          $this->SetY($y_axis);
          $this->SetX(10);
          $this->Cell(20,7,$id,1,0,'L',1);
          $this->Cell(90,7,$name,1,0,'R',1);
          $this->Cell(90,7,$address,1,0,'R',1);          
          $this->Cell(40,7,$email,1,0,'R',1);
          $this->Cell(40,7,number_format($amount, 2),1,0,'R',1);


          $y_axis = $y_axis + $row_height;
          $i = $i + 1;
          $a = $a + $amount;
  }

          $this->SetY($y_axis);
          $this->SetX(10);
          $this->SetFont('Arial','B',6);
          $this->Cell(240,7,"TOTAL",1,0,'C',1);
          $this->Cell(40,7, number_format( $a,2),1,0,'R',1); 
       
}

  function Footer()
  {

    $this->SetY(-8);
    $this->SetFont('Arial','',7);
    $this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'R');
  }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output();

exit;