<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_for".
 *
 * @property int $rel_for_id
 * @property string $rel_for_nombre
 */
class RelFor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_for';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rel_for_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rel_for_id' => 'Rel For ID',
            'rel_for_nombre' => 'Rel For Nombre',
        ];
    }
}
