<?php

namespace frontend\controllers;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
class CvitaeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionIndex2()
    {
        return $this->render('index2');
    }
    
    public function actionPdf()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $content = $this->renderPartial('file');
        $pdf= new PDF([
            //only some of the options shown here
                    'mode' => Pdf::MODE_CORE, 
                    'format' => Pdf::FORMAT_LETTER, 
                    'orientation' => Pdf::ORIENT_PORTRAIT, 
                    'destination' => Pdf::DEST_BROWSER, 
                    'content' => $content,  
                    //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '
        #FotoP{
            width: 120px;
            height: 140px;
            border-radius: 12px;
            border-color: #d6d6d6;
            border-width: 1px;
            border-style: solid;
            margin-left: 25%;
        }
        #SinDatos{
            background-color: #1c31ee;
            color: #d6d6d6;
            text-align: center;
        }

        #header{
            width: 100%;
        }
        #containerCV{
            width: 210mm;
            height: 297mm;
            font-size: 12px;
            padding-right: 50px;
            padding-bottom: 50px;
            padding-left: 50px;    
        }
        body{
            font-size: 12px;
        }
        #nombre{
            font-size: 16px;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        #division{    background-color: #497f43;
            padding-top: 4px;
            padding-bottom: 8px;
            margin-top: 7px;
            margin-bottom: 7px;
            color: whitesmoke;
            font-size: 16px;
        text-align: center;
        }
        #InfAcadTable{
        width: 100%;
        }
        
        #botonera, td{
            padding: 3px;
            text-align: left;
        }
        .btn-success{
            border: 1px;
            border-color: blue;
            background-color: #1c31ee;
        }
        .btn-success:hover {
            background-color: #61abff;
        }
        .btn:active {
            background-color: #aad2ff;
        }
        #pdfbutton{
            border: 1px;
            border-color: blue;
            background-color: #e6213b;
        }
        #pdfbutton:hover {
            background-color: #fa0000;
        }
        ', 
                    ]
                );

                $response = \Yii::$app->response;
                $response->format = \yii\web\Response::FORMAT_RAW;
                $headers = \Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
        return $pdf->render(); 
    }
    public function actionPdf2(){
        $htmlContent=$this->renderPartial('index');
        $pdf = \Yii::$app->pdf;
        $pdf->content = $htmlContent;
        return $pdf->render();
    }

}
