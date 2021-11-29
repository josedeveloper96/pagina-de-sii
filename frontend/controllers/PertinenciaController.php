<?php

namespace frontend\controllers;

use Yii;
use common\models\Pertinencia;
use common\models\search\PertinenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PertinenciaController implements the CRUD actions for Pertinencia model.
 */
class PertinenciaController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Pertinencia models.
     * @return mixed
     */
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

    public function actionIndex()
    {
        if($this->ValidateSession()){
            if(Pertinencia::getPersonalCount(Yii::$app->session['usuario'])>0){
                return $this->render('view', [
                    'model' => $this->findModel(Yii::$app->session['usuario']),
                ]); 
            }else{
                //no tiene contestada la encuesta
                return $this->redirect(['pertinencia/create']);
            }
            $searchModel = new PertinenciaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->goHome();
        }
    }

    /**
     * Displays a single Pertinencia model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if($this->ValidateSession()){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->goHome();
        }
    }
public function actionSelector(){
    if($this->ValidateSession()){
        if(Pertinencia::findOneonly(Yii::$app->session['usuario'])!== null){
            return $this->render('view', [
                'model' =>$this->findModel(Yii::$app->session['usuario']),
            ]);
        }else{
            $model = new Pertinencia();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->per_no_de_control]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }else{
        return $this->goHome();
    }
}
    /**
     * Creates a new Pertinencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if($this->ValidateSession()){
            $model = new Pertinencia();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->per_no_de_control]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Pertinencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if($this->ValidateSession()){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->per_no_de_control]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing Pertinencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
      //  $this->findModel($id)->delete();

      //    return $this->redirect(['index']);
    }

    /**
     * Finds the Pertinencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pertinencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pertinencia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
