<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sec_eco_emp_org".
 *
 * @property int $sec_eco_emp_org_id
 * @property string $sec_eco_emp_org_nombre_seeo
 * @property int $sec_eco_emp_org_ord
 */
class SecEcoEmpOrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sec_eco_emp_org';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sec_eco_emp_org_ord'], 'integer'],
            [['sec_eco_emp_org_nombre_seeo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sec_eco_emp_org_id' => 'Sec Eco Emp Org ID',
            'sec_eco_emp_org_nombre_seeo' => 'Sec Eco Emp Org Nombre Seeo',
            'sec_eco_emp_org_ord' => 'Sec Eco Emp Org Ord',
        ];
    }
}
