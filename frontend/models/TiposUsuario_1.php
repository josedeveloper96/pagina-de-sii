<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipos_usuario".
 *
 * @property string $tus_tipo_usuario
 * @property string $tus_descripcion_tipo
 * @property string $tus_pagina_inicial
 */
class TiposUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipos_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tus_tipo_usuario'], 'required'],
            [['tus_tipo_usuario'], 'string', 'max' => 3],
            [['tus_descripcion_tipo', 'tus_pagina_inicial'], 'string', 'max' => 100],
            [['tus_tipo_usuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tus_tipo_usuario' => 'Tus Tipo Usuario',
            'tus_descripcion_tipo' => 'Tus Descripcion Tipo',
            'tus_pagina_inicial' => 'Tus Pagina Inicial',
        ];
    }

    /*Procedimientos */
    
}
