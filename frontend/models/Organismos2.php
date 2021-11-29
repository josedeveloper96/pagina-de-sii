<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organismos".
 *
 * @property int $org_id
 * @property string $org_nombre_organismo
 */
class Organismos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organismos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_nombre_organismo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'org_id' => 'Org ID',
            'org_nombre_organismo' => 'Org Nombre Organismo',
        ];
    }
}
