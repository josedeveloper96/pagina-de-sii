<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tiempo_primer_empleo".
 *
 * @property int $tie_pem_id
 * @property string $tie_pem_nombre
 */
class TiempoPrimerEmpleo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiempo_primer_empleo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tie_pem_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tie_pem_id' => 'Tie Pem ID',
            'tie_pem_nombre' => 'Tie Pem Nombre',
        ];
    }
}
