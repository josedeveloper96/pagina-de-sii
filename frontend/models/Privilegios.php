<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "privilegios".
 *
 * @property int $pri_id
 * @property string $pri_tipo_usuario
 * @property int $pri_modulo_id
 * @property string $pri_create 1-activo,0-inactivo
 * @property string $pri_update
 * @property string $pri_view
 * @property string $pri_delete
 */
class Privilegios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privilegios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pri_modulo_id'], 'integer'],
            [['pri_tipo_usuario'], 'string', 'max' => 3],
            [['pri_create', 'pri_update', 'pri_view', 'pri_delete'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pri_id' => 'Pri ID',
            'pri_tipo_usuario' => 'Pri Tipo Usuario',
            'pri_modulo_id' => 'Pri Modulo ID',
            'pri_create' => 'Pri Create',
            'pri_update' => 'Pri Update',
            'pri_view' => 'Pri View',
            'pri_delete' => 'Pri Delete',
        ];
    }
    public static function getPrivilegios($TipoUsuario,$sitio){
        $query= new \yii\db\Query;       
        $query->select('modulos.`mod_nombre`,modulos.`mod_status`,modulos.`mod_dir`,modulos.`mod_url`,modulos.`mod_menu_id`,desplegable.`des_descripcion`');
        $query->from('privilegios,modulos,desplegable');

        $query->where('privilegios.`pri_tipo_usuario`=:tipo
        AND   privilegios.`pri_modulo_id`=modulos.`mod_modulo_id`
        AND   modulos.`mod_sitio`=:sitio 
        AND   modulos.`mod_menu_id`=desplegable.`des_id`
        ');                
        $query->orderBy(['modulos.`mod_menu_id`' => SORT_ASC]);    
        $query->orderBy(['modulos.`mod_ord`' => SORT_ASC]);            
        $query->addParams([':sitio' => $sitio]);
        $query->addParams([':tipo' => $TipoUsuario]);
        $raws=$query->all();
        return $raws;
    }
}
