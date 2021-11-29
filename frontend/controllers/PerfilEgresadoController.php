<?php

namespace frontend\controllers;

use Yii;
use common\models\PerfilEgresado;
use common\models\search\PerfilEgresadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//ag GRF subir archivos
use yii\web\UploadedFile;

use common\models\User;
use yii\filters\AccessControl;
/**
 * PerfilEgresadoController implements the CRUD actions for PerfilEgresado model.
 */
class PerfilEgresadoController extends Controller
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

    /**
     * Lists all PerfilEgresado models.
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
            $searchModel = new PerfilEgresadoSearch();
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
     * Displays a single PerfilEgresado model.
     * @param integer $id
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

    /**
     * Creates a new PerfilEgresado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if($this->ValidateSession()){
            //codigo de referencia puppyland
            $model = new PerfilEgresado();

            if ($model->load(Yii::$app->request->post()) ) {
                $image = UploadedFile::getInstance($model, 'per_foto');
               if (!is_null($image)) {
                 $model->per_img_scr_fname = $image->name;
                 $ext = explode(".", $image->name);
                  // generate a unique file name to prevent duplicate filenames
                  $model->per_image_web_filename = Yii::$app->security->generateRandomString().".{$ext[1]}";
                  // the path to save file, you can set an uploadPath
                  // in Yii::$app->params (as used in example below)                       
                  Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/perfiles/';
                  $path = Yii::$app->params['uploadPath'] . $model->per_img_scr_fname;
                   $image->saveAs($path);
                }
                
                if ($model->save()) {    
                    return $this->redirect(['view', 'id' => $model->per_egr_id]);
                }  else {
                    var_dump ($model->getErrors()); die();
                 }
                
                //return $this->redirect(['view', 'id' => $model->id, 'nombre' => $model->nombre, 'cliente_id' => $model->cliente_id]);
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);

            ///
            $model = new PerfilEgresado();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->per_egr_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->goHome();
        }
    }

    /**
     * Updates an existing PerfilEgresado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if($this->ValidateSession()){        
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->per_egr_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->goHome();
        }        
    }

    /**
     * Deletes an existing PerfilEgresado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       // $this->findModel($id)->delete();

       // return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilEgresado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PerfilEgresado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PerfilEgresado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
