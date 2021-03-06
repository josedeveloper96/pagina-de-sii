<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ladas".
 *
 * @property int $id
 * @property string $iso
 * @property string $name
 * @property string $nicename
 * @property string $iso3
 * @property int $numcode
 * @property int $phonecode
 */
class Ladas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ladas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iso', 'name', 'nicename', 'phonecode'], 'required'],
            [['numcode', 'phonecode'], 'integer'],
            [['iso'], 'string', 'max' => 2],
            [['name', 'nicename'], 'string', 'max' => 80],
            [['iso3'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iso' => 'Iso',
            'name' => 'Name',
            'nicename' => 'Nicename',
            'iso3' => 'Iso3',
            'numcode' => 'Numcode',
            'phonecode' => 'Phonecode',
        ];
    }
}
