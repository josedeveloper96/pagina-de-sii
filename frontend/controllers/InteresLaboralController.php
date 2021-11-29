<?php

namespace frontend\controllers;

use Yii;
use common\models\InteresLaboral;
use app\models\InteresLaboralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\growl\Growl;

//ag GRF subir archivos
use yii\web\UploadedFile;

use common\models\PerfilEgresado;
use common\models\InformacionLaboral;
use common\models\InfAcademica;
use common\models\RefProfesionales;
use common\models\Pertinencia;

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
    
    public function actionPrivacidad()
    {
        
        return $this->renderAjax('privacidad');
    }
    
    public function actionConstruccion()
    {
        
        return $this->render('construccion');
    }

    /**
     * Displays a single InteresLaboral model.
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

    public function actionPaso1()
    {
        $session = Yii::$app->session;
        
        //buscar si ya existe

        $ts = (new \yii\db\Query())
          ->select('inl_id,inl_paso')
          ->from('interes_laboral')
          ->where('inl_no_de_control=:nc',[':nc'=>$session['usuario']])       
          ->one(); 




          if($ts['inl_id']!=''){
            
            if($ts['inl_paso']==1){
             
             return $this->redirect(['paso1u', 'id' => $ts['inl_id']]);   

            } else if($ts['inl_paso']==2){
             return $this->redirect(['paso2', 'id' => $ts['inl_id']]);   

            }else if($ts['inl_paso']==3){
             return $this->redirect(['paso3', 'id' => $ts['inl_id']]);   

            }else {

              return $this->redirect(['bolsa', 'id' => $ts['inl_id']]);         

            }




          }else{
            //no existe registro


                $model = new InteresLaboral();
                
                $model->inl_fecha_update=date("Y-m-d H:i:s");
                $model->inl_paso=1;
                $model->inl_no_de_control=$session['usuario'];

                
                //if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if ($model->load(Yii::$app->request->post()) ) {

                    if($model->inl_cuenta_empleo!=''){

                        $model->save();
                        return $this->redirect(['paso2', 'id' => $model->inl_id]);
                    }else{


                            echo Growl::widget([
                                'type' => Growl::TYPE_DANGER,
                                'icon' => 'glyphicon glyphicon-remove',
                                'title' => 'ERROR',
                                'showSeparator' => true,
                                'body' => 'Debes de contestar Si ó No.'
                              ]);

                    }
                    
                    
                }

                return $this->render('paso1', [
                    'model' => $model,
                ]);
        }
    }

    public function actionPaso1u($id)
    {
        $session = Yii::$app->session;
        $model = $this->findModel($id);
        
        $model->inl_fecha_update=date("Y-m-d H:i:s");
        $model->inl_paso=1;
       

        
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
         if ($model->load(Yii::$app->request->post()) ) {

            if($model->inl_cuenta_empleo!=''){

                $model->save();
                return $this->redirect(['paso2', 'id' => $model->inl_id]);
            }else{


                    echo Growl::widget([
                        'type' => Growl::TYPE_DANGER,
                        'icon' => 'glyphicon glyphicon-remove',
                        'title' => 'ERROR',
                        'showSeparator' => true,
                        'body' => 'Debes de contestar si ¿Actualmente tienes un empleo?'
                      ]);

            }
            
            
        }

        return $this->render('paso1u', [
            'model' => $model,
        ]);
    }

     public function actionPaso2($id)
    {
        
         
         
         
        $model = $this->findModel($id);

        $model->inl_fecha_update=date("Y-m-d H:i:s");
        $model->inl_paso=2;



        if ($model->load(Yii::$app->request->post()) ) {
            


            if(($model->inl_curriculum_plataforma_archivo=='A' || $model->inl_curriculum_plataforma_archivo=='P')){

                $model->save();
                return $this->redirect(['paso3', 'id' => $model->inl_id]);  
               

            }else{
               //error en 
                
                echo Growl::widget([
                        'type' => Growl::TYPE_DANGER,
                        'icon' => 'glyphicon glyphicon-remove',
                        'title' => 'ERROR',
                        'showSeparator' => true,
                        'body' => 'Debes de seleccionar el Curriculum que vas a Utilizar'
                      ]);

            }


            
        }

        return $this->render('paso2', [
            'model' => $model,
        ]);
    }

    public function actionPaso3($id)
    {
        
         $no_de_control=Yii::$app->session['usuario'];
         $valorPertinencia=Pertinencia::getPersonalCount($no_de_control); 
         //$valorInformacionLaboral=InformacionLaboral::getPersonalCount($no_de_control);
         $valorPerfilEgresado=PerfilEgresado::getPeriodoact($no_de_control);
         $valorInfAcademica=InfAcademica::getPersonalCount($no_de_control);
         $valorRepProfesional=RefProfesionales::getProfesionalCount($no_de_control);
        
        
        
        $model = $this->findModel($id);

        $model->inl_fecha_update=date("Y-m-d H:i:s");
        $model->inl_paso=3;



        if ($model->load(Yii::$app->request->post()) ) {



            $image = UploadedFile::getInstance($model, 'inl_url_curriculum');

            if($model->inl_curriculum_plataforma_archivo=='A'){
                //en caso de que elijan subir el archivo

                if (!is_null($image)) {
                     //$model->per_img_scr_fname = $image->name;
                     $ext = explode(".", $image->name);
                      // generate a unique file name to prevent duplicate filenames
                      //$model->con_url = Yii::$app->security->generateRandomString().".{$ext[1]}";
                     $temp = $model->inl_no_de_control."-CV-".Yii::$app->security->generateRandomString().".{$ext[1]}";
                      // the path to save file, you can set an uploadPath
                      // in Yii::$app->params (as used in example below)                       
                      Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/cv/';
                      $path = Yii::$app->params['uploadPath'] . $temp;
                        $image->saveAs($path);

                        $model->inl_url_curriculum=$temp;

                                $session = Yii::$app->session; 
                                if($session['rol']=="TIT" ||$session['rol']=="EGR" ){
                                    
                                    if($valorPertinencia < 1){
                                      //si no se realizo la encuesta de satisfaccion
                                        echo Growl::widget([
                                                'type' => Growl::TYPE_DANGER,
                                                'icon' => 'glyphicon glyphicon-remove',
                                                'title' => 'ERROR',
                                                'showSeparator' => true,
                                                'body' => 'Antes terminar debes de contestar la Encuesta de Satisfacción'
                                              ]);
                                             
                                            //return $this->redirect(['pertinencia/index']);
                                    }else{
                                       //si se presento la encuesta de satisfaccion
                                        
                                        if($model->inl_política_privacidad!='0'){

                                            echo Growl::widget([
                                                'type' => Growl::TYPE_SUCCESS,
                                                'icon' => 'glyphicon glyphicon-ok-sign',
                                                'title' => 'Excelente',
                                                'showSeparator' => true,
                                                'body' => 'Tu información ha sido registrada'
                                              ]);

                                            $model->inl_paso=4;
                                            $model->save();
                                            return $this->redirect(['site/index']);   

                                        }else{
                                            //no acepto el aviso de privacidad
                                            echo Growl::widget([
                                                'type' => Growl::TYPE_DANGER,
                                                'icon' => 'glyphicon glyphicon-remove',
                                                'title' => 'ERROR',
                                                'showSeparator' => true,
                                                'body' => 'Debes de aceptar el Aviso de Privacidad'
                                              ]);

                                        } 
                                        
                                    }
                                    
                                }else if($session['rol']=="ACT"){
                                 
                                        if($model->inl_política_privacidad!='0'){

                                            echo Growl::widget([
                                                'type' => Growl::TYPE_SUCCESS,
                                                'icon' => 'glyphicon glyphicon-ok-sign',
                                                'title' => 'Excelente',
                                                'showSeparator' => true,
                                                'body' => 'Tu información ha sido registrada'
                                              ]);

                                            $model->inl_paso=4;
                                            $model->save();
                                            return $this->redirect(['site/index']);   

                                        }else{
                                            echo Growl::widget([
                                                'type' => Growl::TYPE_DANGER,
                                                'icon' => 'glyphicon glyphicon-remove',
                                                'title' => 'ERROR',
                                                'showSeparator' => true,
                                                'body' => 'Debes de aceptar el Aviso de Privacidad'
                                              ]);

                                        }    
                                    
                                    
                                }
                        
                                

                    }else{

                      echo Growl::widget([
                                'type' => Growl::TYPE_DANGER,
                                'icon' => 'glyphicon glyphicon-remove',
                                'title' => 'ERROR',
                                'showSeparator' => true,
                                'body' => 'Debe de Subir un Curriculum Vitae'
                              ]);  
                    }
                }else{

                    //en caso de que elija usar el curriculum vitae de la plataforma
                              
                 if($valorPertinencia < 1 && (Yii::$app->session['rol']=="TIT" || Yii::$app->session['rol']=="EGR" )){
                  //no realizo la encuesta de satisfaccion
                     
                                            echo Growl::widget([
                                                'type' => Growl::TYPE_DANGER,
                                                'icon' => 'glyphicon glyphicon-remove',
                                                'title' => 'ERROR',
                                                'showSeparator' => true,
                                                'body' => 'Antes terminar debes de contestar la Encuesta de Satisfacción'
                                              ]);
                     
                 }else if($valorPerfilEgresado < 1){
                     
                      echo Growl::widget([
                                            'type' => Growl::TYPE_DANGER,
                                            'icon' => 'glyphicon glyphicon-remove',
                                            'title' => 'ERROR',
                                            'showSeparator' => true,
                                            'body' => 'Antes terminar debes de tener Actualizado tu Perfil'
                                          ]);
                     
                 }else if($valorRepProfesional < 1){
                     
                     echo Growl::widget([
                                            'type' => Growl::TYPE_DANGER,
                                            'icon' => 'glyphicon glyphicon-remove',
                                            'title' => 'ERROR',
                                            'showSeparator' => true,
                                            'body' => 'Antes terminar debes de tener como mínimo una Referencias Profesionales'
                                          ]);
                     
                     
                 }else if($model->inl_política_privacidad=='0'){
                     
                                            echo Growl::widget([
                                                'type' => Growl::TYPE_DANGER,
                                                'icon' => 'glyphicon glyphicon-remove',
                                                'title' => 'ERROR',
                                                'showSeparator' => true,
                                                'body' => 'Debes de aceptar el Aviso de Privacidad'
                                              ]);
                     
                     
                 }else{
                     
                                            echo Growl::widget([
                                                'type' => Growl::TYPE_SUCCESS,
                                                'icon' => 'glyphicon glyphicon-ok-sign',
                                                'title' => 'Excelente',
                                                'showSeparator' => true,
                                                'body' => 'Tu información ha sido registrada'
                                              ]);

                                            $model->inl_paso=4;
                                            $model->save();
                                            return $this->redirect(['site/index']); 
                     
                     
                 }
                    
                    

                }
              
            
        }

        return $this->render('paso3', [
            'model' => $model,
        ]);
    }


     public function actionBolsa($id)
    {
        $model = $this->findModel($id);


        return $this->render('bolsa', [
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
}
