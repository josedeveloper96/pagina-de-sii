<?php
namespace app\models;

use Yii;
use yii\base\Model;

class EstadisticasEgresados extends Model
{
    public $carrera;
    public $periodo;
    public $tipo;
    public function rules()
    {
        return [
            [['carrera', 'periodo','tipo'], 'safe'],
        ];
    }
}