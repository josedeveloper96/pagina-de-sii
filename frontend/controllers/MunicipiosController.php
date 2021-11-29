<?php

namespace frontend\controllers;
use Yii;
use common\models\Municipios;
use yii\helpers\ArrayHelper;

class MunicipiosController extends \yii\web\Controller
{
   
    
    public function actionSample() {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $muni=Municipios::find()->where('mpio_estado_id = :id', [':id' => $data['idestado']])->asArray()->all();
            return \yii\helpers\Json::encode($muni);
          }else{
              return 'contenido';
          }
    }
}
