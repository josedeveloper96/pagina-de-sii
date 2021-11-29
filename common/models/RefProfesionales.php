<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_profesionales".
 *
 * @property int $ref_id
 * @property string $ref_no_de_control
 * @property string $ref_nombres
 * @property string $ref_email
 * @property string $ref_no_cel
 * @property string $ref_ocupacion
 */
class RefProfesionales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_profesionales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_no_de_control','ref_nombres', 'ref_email','ref_ocupacion'], 'required'],
            [['ref_no_de_control', 'ref_no_cel'], 'string', 'max' => 15],
            [['ref_nombres', 'ref_email'], 'string', 'max' => 50],
            [['ref_ocupacion'], 'string', 'max' => 100],
            [['ref_email'],'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref_id' => 'ref ID',
            'ref_no_de_control' => 'No. Control',
            'ref_nombres' => 'Nombre completo',
            'ref_email' => 'Correo electrónico',
            'ref_no_cel' => 'Teléfono',
            'ref_ocupacion' => 'Ocupación',
        ];
    }
    public static function getProfesionalData($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('ref_profesionales');

        $query->where('ref_profesionales.`ref_no_de_control`=:num');        
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->all();
        return $raws;
    }
    
    public static function getProfesionalCount($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('ref_profesionales');
        $query->where('ref_profesionales.`ref_no_de_control`=:num');        
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->count();
        return $raws;
    }
}
