<?php

namespace backend\controllers;
use common\models\User;

class MigrateController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;//permite api restfull post
    
    public function actionIndex()
    {
        
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $j = \yii::$app->request->post();
        
        if($j['apiKey']=='123'){
        
            $modUser=User::findByUsernameRest($j['username']);

            if($modUser){
               $modUser->email=$j['email'];
               $modUser->role = $j['status'];
               $modUser->setPassword($j['password']);
               $modUser->save();
               return 'update';

            }else{

                $user = new User();
                $user->username = $j['username'];
                $user->email = $j['email'];
                $user->role = $j['status'];
                $user->status = 2;
                $user->setPassword($j['password']);
                $user->generateAuthKey();
                $user->generateEmailVerificationToken();
                $user->save();
                return 'insert';
            }
        
        } else {
            return 'error apiKey';
        }
        
        
        //echo 'funciona';
        //exit;
        
        //return $this->render('index');
    }

}
