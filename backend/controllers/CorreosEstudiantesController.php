<?php

namespace backend\controllers;

use Yii;
use common\models\CorreosEstudiantes;
use common\models\CorreosEstudiantesEnviados;
use app\models\CorreosEstudiantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CorreosEstudiantesController implements the CRUD actions for CorreosEstudiantes model.
 */
class CorreosEstudiantesController extends Controller
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
     * Lists all CorreosEstudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CorreosEstudiantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionEnviar($id)
    {
       
        function is_valid_email($str)
            {
              $matches = null;
              return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
            }
        
        $model=$this->findModel($id);
        
        if($model->ce_no_de_control != ''){
            $no="and est_no_de_control='{$model->ce_no_de_control}'";
        }else{
            $no="";            
        }
        
        if($model->ce_carrera != ''){
            $ca="and est_carrera='{$model->ce_carrera}'";
        }else{
            $ca="";            
        }
        
        if($model->ce_semestre_min != ''){
            $se="and (est_semestre BETWEEN {$model->ce_semestre_min} AND {$model->ce_semestre_max})";
        }else{
            $se="";            
        }
        
        if($model->ce_promedio_min != ''){
            $po="and (est_promedio_final_alcanzado BETWEEN {$model->ce_promedio_min} AND {$model->ce_promedio_max})";
        }else{
            $po="";            
        }
        
        if($model->ce_creditos_min != ''){
            $cr="and (est_creditos_aprobados BETWEEN {$model->ce_creditos_min} AND {$model->ce_creditos_max})";
        }else{
            $cr="";            
        }
        
        //consulta------------------------
        $rows = (new \yii\db\Query())
          ->select("est_no_de_control,est_estatus_alumno,est_sexo,est_correo_electronico,est_nombre_alumno,est_apellido_paterno,est_apellido_materno,est_sexo")
          ->from('estudiantes')
          ->where("est_estatus_alumno='{$model->ce_tipo_estudiante}' $no $ca $se $po and est_correo_electronico <> '' and est_correo_electronico is not null")       
          ->all();
          //$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}"; 
          //consulta-----------------------------------------------------------------------------------
        
        
        $msj="";
        
        
        \Yii::$app->mailer->htmlLayout = "layouts/html";
     
        $n=0;
        foreach ($rows as $row) {
            
            //buscar si ya se envio---------------------------
            
            $envio = (new \yii\db\Query())
          ->select("*")
          ->from('correos_estudiantes_enviados')
          ->where("cee_no_de_control='{$row['est_no_de_control']}' and cee_correo_id=$id ")       
          ->count();
            
          if($envio > 0){
              continue;
          }
            //buscar si ya se envio---------------------------
            
            
            
            if($row['est_estatus_alumno']=='ACT'){
               $es="ESTUDIANTE"; 
            }else if($row['est_estatus_alumno']=='EGR'){
                
                if($row['est_sexo']=='M'){
                  $es="EGRESADO";   
                }else{
                  $es="EGRESADA";  
                }
                
            }else if($row['est_estatus_alumno']=='TIT'){
                if($row['est_sexo']=='M'){
                  $es="EGRESADO TITULADO";   
                }else{
                  $es="EGRESADA TITULADA";  
                }
            }
            
            $msj="<b>{$row['est_nombre_alumno']} {$row['est_apellido_paterno']} {$row['est_apellido_materno']}<br>"
            . "$es DEL INSTITUTO TECNOLÓGICO DE REYNOSA</b><br><br>".$model->ce_contenido;
            
            if(is_valid_email($row['est_correo_electronico'])){
                
                try {
                
                Yii::$app->mailer->compose()
                ->setFrom(['web_reynosa@tecnm.mx' => Yii::$app->name])
                ->setTo($row['est_correo_electronico'])                 
                ->setSubject($model->ce_asunto."/ No Responder a este correo")
                ->setTextBody('Plain text content')
                ->setHtmlBody($msj)->send();
                $n++;
                
                $ee=new CorreosEstudiantesEnviados();
               
                $ee->cee_no_de_control=$row['est_no_de_control'];
                $ee->cee_correo_id=$id;
                $ee->save();
                
                //sleep(30);
                
                
                } catch (Exception $ex) {
                    
                }
                
                
                
            }else{
                continue;
            }
     
        }//foreach ($rows as $row) {
     
        Yii::$app->session->setFlash('success', "Se Enviaron $n correos"); 
          
     
     //$msj="<b>{}";
        
         
         
       
        
        $searchModel = new CorreosEstudiantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CorreosEstudiantes model.
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
     * Creates a new CorreosEstudiantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CorreosEstudiantes();

        if ($model->load(Yii::$app->request->post()) ) {
            
            
            if($model->ce_semestre_max==''){
               $model->ce_semestre_max=$model->ce_semestre_min; 
            }
            
            if($model->ce_promedio_max==''){
               $model->ce_promedio_max=$model->ce_promedio_min; 
            }
            
            if($model->ce_creditos_max==''){
               $model->ce_creditos_max=$model->ce_creditos_min; 
            }
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->ce_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CorreosEstudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            
            if($model->ce_semestre_max==''){
               $model->ce_semestre_max=$model->ce_semestre_min; 
            }
            
            if($model->ce_promedio_max==''){
               $model->ce_promedio_max=$model->ce_promedio_min; 
            }
            
            if($model->ce_creditos_max==''){
               $model->ce_creditos_max=$model->ce_creditos_min; 
            }
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->ce_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CorreosEstudiantes model.
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
     * Finds the CorreosEstudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CorreosEstudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CorreosEstudiantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
