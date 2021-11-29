<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inf_academica".
 *
 * @property int $infac_id id tabla
 * @property int $infac_escuela_id id de la lista de escuelas a registrar
 * @property int $infac_tipo Para tipos de informacion academica
 * @property string $infac_disiplina si es universidad, maestría curso o certificacion
 * @property string $infac_promedio promerio de el usuario
 * @property string $infac_registro ya sea numero de certificado, titulacion o mestria
 * @property string $infac_fechini inicio de su periodo
 * @property string $infac_fechfin final de su periodo
 * @property string $infac_no_de_control
 *
 * @property InfEscuelas $infacEscuela
 * @property TiposAcademicos $infacTipo
 */
class InfAcademica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inf_academica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['infac_escuela_id', 'infac_disiplina'], 'required'],
            [['infac_escuela_id', 'infac_tipo'], 'integer'],
            [['infac_fechini', 'infac_fechfin'], 'safe'],
            [['infac_disiplina'], 'string', 'max' => 60],
            [['infac_promedio', 'infac_no_de_control'], 'string', 'max' => 10],
            [['infac_registro'], 'string', 'max' => 30],
            [['infac_escuela_id'], 'exist', 'skipOnError' => true, 'targetClass' => InfEscuelas::className(), 'targetAttribute' => ['infac_escuela_id' => 'infes_id']],
            [['infac_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TiposAcademicos::className(), 'targetAttribute' => ['infac_tipo' => 'tesc_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'infac_id' => 'Infac ID',
            'infac_escuela_id' => 'Institución',
            'infac_tipo' => 'Grado obtenido',
            'infac_disiplina' => 'Disciplina',
            'infac_promedio' => 'Promedio final (0-100) / Duración del curso (horas)',
            'infac_registro' => 'Número de registro',
            'infac_fechini' => 'Fecha de ingreso',
            'infac_fechfin' => 'Fecha de egreso',
            'infac_no_de_control' => 'Número de control',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfacEscuela()
    {
        return $this->hasOne(InfEscuelas::className(), ['infes_id' => 'infac_escuela_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfacTipo()
    {
        return $this->hasOne(TiposAcademicos::className(), ['tesc_id' => 'infac_tipo']);
    }
    public static function getPersonalData($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('tipos_academicos.`tesc_id`,inf_escuelas.`infes_nmbre`, tipos_academicos.`tesc_nombre`,inf_academica.`infac_disiplina`,
        inf_academica.`infac_registro`,inf_academica.`infac_fechini`, inf_academica.`infac_fechfin`');
        $query->from('inf_academica,inf_escuelas,tipos_academicos');
        $query->where(' inf_academica.`infac_escuela_id`=inf_escuelas.`infes_id`
         AND inf_academica.`infac_tipo`=tipos_academicos.`tesc_id`
         AND inf_academica.infac_no_de_control=:num');        
        $query->orderBy(['inf_academica.`infac_fechini`' => SORT_ASC]);
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->all();
        return $raws;
    }
    public static function getPersonalCount($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('inf_academica');
        $query->where(' inf_academica.`infac_no_de_control`=:num');                        
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->count();
        return $raws;
    }
}
