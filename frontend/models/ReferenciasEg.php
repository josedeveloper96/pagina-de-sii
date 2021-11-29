<?php

namespace app\models;

use Yii;


use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "referencias_eg".
 *
 * @property int $reg_id
 * @property string $reg_no_de_control
 * @property string $reg_email
 * @property string $reg_cel
 * @property string $reg_facebook
 * @property string $reg_linkedin
 * @property string $reg_instragram
 * @property string $reg_twitter
 * @property string $reg_skype
 * @property string $reg_comentario
 * @property string $reg_fecha
 * @property int $reg_user_id
 */
class ReferenciasEg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referencias_eg';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['reg_fecha'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['reg_fecha'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_no_de_control', 'reg_email', 'reg_user_id','reg_cel'], 'required'],
            [['reg_fecha'], 'safe'],
            [['reg_user_id'], 'integer'],
            [['reg_email'], 'email'],
            [['reg_no_de_control'], 'string', 'max' => 10],
            [['reg_email', 'reg_facebook', 'reg_linkedin', 'reg_instragram', 'reg_twitter', 'reg_skype'], 'string', 'max' => 50],
            [['reg_cel'], 'string', 'max' => 15],
            [['reg_comentario'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => 'Reg ID',
            'reg_no_de_control' => 'No de Control',
            'reg_email' => 'Email',
            'reg_cel' => 'Teléfono Celular',
            'reg_facebook' => 'Facebook',
            'reg_linkedin' => 'Linkedin',
            'reg_instragram' => 'Instragram',
            'reg_twitter' => 'Twitter',
            'reg_skype' => 'Skype',
            'reg_comentario' => 'Comentario',
            'reg_fecha' => 'Fecha',
            'reg_user_id' => 'Reg User ID',
        ];
    }
}
