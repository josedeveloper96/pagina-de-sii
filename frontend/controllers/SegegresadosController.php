<?php

namespace frontend\controllers;

use app\models\ReferenciasEg;
use common\models\CorreosEstudiantesSE;
use common\models\CorreosEstudiantes;
use Yii;
use common\models\Estudiantes;
use common\models\User;
use app\models\SegestudiantesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SegegresadosController implements the CRUD actions for Estudiantes model.
 */
class SegegresadosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['delete', 'update','new'],
                'rules' => [

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = ['SAD'];
                            return User::roleInArray($valid_roles) && User::isActive();
                        }
                    ],

                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = ['SAD'];
                            return User::roleInArray($valid_roles) && User::isActive();
                        }
                    ],
                    [
                        'actions' => ['new'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = ['SAD'];
                            return User::roleInArray($valid_roles) && User::isActive();
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Estudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SegestudiantesSearch();
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

    public function actionViewreg($id)

    {
        return $this->render('viewreg', [
            'model' => ReferenciasEg::find()->where(['reg_id'=>$id])->one(),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->est_no_de_control]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatereg($no_de_control){

        $model = new ReferenciasEg();
        $model->reg_no_de_control=$no_de_control;
        $model->reg_user_id=$id=Yii::$app->session['id'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $no_de_control]);
        }

        return $this->render('createreg', [
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

    public function actionCorreo($id)
    {
        //$model = new InvitacionEgr();
        //$request = Yii::$app->request;
        //$id = $request->get('no_de_control');
        //$email = $request->get('email');
        //$values=$request->get();

        $model=Estudiantes::findOne($id);

        $email='nefivirtual@gmail.com';

        //$email=$model->est_correo_electronico;

        $dato=CorreosEstudiantes::sendEmail($id,$email);
        if ($dato) {

            //grabar el correo enviado
            $modelCE=new CorreosEstudiantesSE();
            $modelCE->ce_tipo_correo_id =1;
            $modelCE->ce_no_de_control=$id;
           // $modelCE->ce_fecha=date('Y-m-d H:i:s');
            $modelCE->ce_user_id=Yii::$app->session['id'];
            $modelCE->save();


            Yii::$app->session->setFlash('success', 'Invitación entregada.');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
        else {
            Yii::$app->session->setFlash('error', 'Ha ocurrido un error .');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
        //return $this->render('automatic');

    }

    protected function findModel($id)
    {
        if (($model = Estudiantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
