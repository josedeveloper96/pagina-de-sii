<?php

namespace frontend\controllers;
use Yii;
use common\models\Localidades;
use yii\helpers\ArrayHelper;
class LocalidadesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSample() {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $muni=Localidades::find()->where('loc_municipio_id = :id', [':id' => $data['idmunic']])->asArray()->all();
            return \yii\helpers\Json::encode($muni);
          }else{
              return 'contenido';
          }
    }
}
