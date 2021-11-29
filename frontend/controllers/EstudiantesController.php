<?php

namespace frontend\controllers;

use Yii;
use common\models\Estudiantes;
use common\models\search\estudiantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


use yii\filters\AccessControl;
/**
 * EstudiantesController implements the CRUD actions for Estudiantes model.
 */
class EstudiantesController extends Controller
{
    /**
     * @inheritdoc
     */
    
  

    public function behaviors()
    {
        

                 return [
                    'access' => [
                        'class' => AccessControl::className(),
                        'only' => ['index','create','update','view','update','delete'],
                        'rules' => [
                            
                            [
                                'allow' => true,
                                'actions' => ['index','create','update','view','update','delete'],
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                ];
            



        /*
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];*/
    }

    //validación nde la session
    public function ValidateSession(){
        if(Yii::$app->session->has('usuario')){
            if(Yii::$app->session->has('usuario')!=""){
                return true;
            }else{
                return false;
            }
        }else{
            return false;            
        }
    }

    /**
     * Lists all Estudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new estudiantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudiantes model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Estudiantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estudiantes();
//
//   $model->load(Yii::$app->request->post());
//        if($_POST){
//            $file = \yii\web\UploadedFile::getInstance($model, 'est_foto');
//            if($file->saveAs(\Yii::getAlias('@webroot/uploads/estudiantes')."/".$file->name))
//                $model->est_foto = $file->name;
//        }
//        if ($model->save()) {
//            return $this->redirect(['view', 'id' => $model->est_no_de_control]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
 if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->est_no_de_control]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->est_no_de_control]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estudiantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Estudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estudiantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    
}
