<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carreras".
 *
 * @property string $carr_id
 * @property int $carr_reticula
 * @property string $carr_nivel_escolar
 * @property string $carr_clave_oficial
 * @property string $carr_nombre_carrera
 * @property string $carr_nombre_reducido
 * @property string $carr_siglas
 * @property int $carr_carga_maxima
 * @property int $carr_carga_minima
 * @property string $carr_fecha_inicio
 * @property string $carr_fecha_termino
 * @property string $carr_clave_cosnet
 * @property int $carr_creditos_totales
 * @property int $carr_modalidad_id
 */
class Carreras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carreras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carr_id'], 'required'],
            [['carr_reticula', 'carr_carga_maxima', 'carr_carga_minima', 'carr_creditos_totales', 'carr_modalidad_id'], 'integer'],
            [['carr_fecha_inicio', 'carr_fecha_termino'], 'safe'],
            [['carr_id'], 'string', 'max' => 3],
            [['carr_nivel_escolar'], 'string', 'max' => 1],
            [['carr_clave_oficial'], 'string', 'max' => 20],
            [['carr_nombre_carrera'], 'string', 'max' => 80],
            [['carr_nombre_reducido'], 'string', 'max' => 30],
            [['carr_siglas'], 'string', 'max' => 10],
            [['carr_clave_cosnet'], 'string', 'max' => 2],
            [['carr_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'carr_id' => 'Carr ID',
            'carr_reticula' => 'Carr Reticula',
            'carr_nivel_escolar' => 'Carr Nivel Escolar',
            'carr_clave_oficial' => 'Carr Clave Oficial',
            'carr_nombre_carrera' => 'Carr Nombre Carrera',
            'carr_nombre_reducido' => 'Carr Nombre Reducido',
            'carr_siglas' => 'Carr Siglas',
            'carr_carga_maxima' => 'Carr Carga Maxima',
            'carr_carga_minima' => 'Carr Carga Minima',
            'carr_fecha_inicio' => 'Carr Fecha Inicio',
            'carr_fecha_termino' => 'Carr Fecha Termino',
            'carr_clave_cosnet' => 'Carr Clave Cosnet',
            'carr_creditos_totales' => 'Carr Creditos Totales',
            'carr_modalidad_id' => 'Carr Modalidad ID',
        ];
    }
}
