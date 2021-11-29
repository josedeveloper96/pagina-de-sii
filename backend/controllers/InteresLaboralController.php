<?php

namespace backend\controllers;

use Yii;
use common\models\InteresLaboral;
use backend\models\Usuario;
use app\models\InteresLaboralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use kartik\mpdf\Pdf;

/**
 * InteresLaboralController implements the CRUD actions for InteresLaboral model.
 */
class InteresLaboralController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all InteresLaboral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InteresLaboralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InteresLaboral model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $model= $this->findModel($id);

        if($model->inl_curriculum_plataforma_archivo !='' && $model->inl_paso==4 ){
             if($model->inl_curriculum_plataforma_archivo =='P'){
                //plataforma
                return $this->render('vitae', [
                    'model' => $this->findModel($id),
                ]);

             }else{
                //pdf
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);

             }

        }else{

        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InteresLaboral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InteresLaboral();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inl_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InteresLaboral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inl_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
     public function actionEmail($id)
    {
         Usuario::sendEmail2('nefivirtual@gmail.com');
         
         
         return false;
    }

    /**
     * Deletes an existing InteresLaboral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InteresLaboral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InteresLaboral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InteresLaboral::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPdf($id)
    {
        
        $model = $this->findModel($id);

        

        $session = Yii::$app->session;
        $session->set('nc', $model->inl_no_de_control);


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
}
