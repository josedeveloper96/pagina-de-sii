<?php

namespace frontend\controllers;

use Yii;
use common\models\Empresas;
use common\models\search\EmpresasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresasController implements the CRUD actions for Empresas model.
 */
class EmpresasController extends Controller
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
     * Lists all Empresas models.
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
    //    $searchModel = new EmpresasSearch();
     //   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //    //$dataProvider->query->andWhere(['inf_lab_no_de_control'=>Yii::$app->session['usuario']]);
    //    return $this->render('index', [
     //       'searchModel' => $searchModel,
    //        'dataProvider' => $dataProvider,
    //    ]);
    }
    /**
     * Displays a single Empresas model.
     * @param integer $id
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
     * Creates a new Empresas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
            $model = new Empresas();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'id' => $model->emp_id]);
                return $this->redirect(['informacion-laboral/create']);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Empresas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    //    $model = $this->findModel($id);
    //    
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //        return $this->redirect(['view', 'id' => $model->emp_id]);
    //    }

    //    return $this->render('update', [
    //        'model' => $model,
    //    ]);
    }

    /**
     * Deletes an existing Empresas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    //    $this->findModel($id)->delete();

    //    return $this->redirect(['index']);
    }

    /**
     * Finds the Empresas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSample() {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $muni=Empresas::find()->where('emp_id = :id', [':id' => $data['empid']])->asArray()->all();
            return \yii\helpers\Json::encode($muni);
          }else{
              return 'contenido';
          }
    }
    protected function findModel($id)
    {
        if (($model = Empresas::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

}