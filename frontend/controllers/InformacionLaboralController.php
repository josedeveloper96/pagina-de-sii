<?php

namespace frontend\controllers;

use Yii;
use common\models\InformacionLaboral;
use common\models\User;
use common\models\search\informacionLaboralsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\filters\AccessControl;

/**
 * InformacionLaboralController implements the CRUD actions for InformacionLaboral model.
 */
class InformacionLaboralController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            //---------
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create', 'update','delete','view','index'],
                'rules' => [
                    
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = ['ACT','TIT','EGR'];
                        return User::roleInArray($valid_roles) && User::isActive();
                    }
                    ],
                            
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = ['GTV'];
                        return User::roleInArray($valid_roles) && User::isActive();
                    }
                    ],

                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = ['ACT','TIT','EGR'];
                        return User::roleInArray($valid_roles) && User::isActive();
                    }
                    ],

                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = ['ACT','TIT','EGR'];
                        return User::roleInArray($valid_roles) && User::isActive();
                    }
                    ],

                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = ['ACT','TIT','EGR'];
                        return User::roleInArray($valid_roles) && User::isActive();
                    }
                    ],
                ],
            ],
            //--------
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
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
     * Lists all InformacionLaboral models.
     * @return mixed
     */
    public function actionIndex()
    {
        if($this->ValidateSession()){
                $searchModel = new informacionLaboralsearch();
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
     * Displays a single InformacionLaboral model.
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
     * Creates a new InformacionLaboral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InformacionLaboral();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inf_lab_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InformacionLaboral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inf_lab_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InformacionLaboral model.
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
     * Finds the InformacionLaboral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InformacionLaboral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InformacionLaboral::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionExportToPdf($model)
    {
        $data = $model::getExportData();

        return $this->render($data['exportFile'], [
            'data'=> $data['data'],
            ]);
    }
}
