<?php

namespace common\models;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\TiempoPrimerEmpleo;

use Yii;

/**
 * This is the model class for table "pertinencia".
 *
 * @property string $per_no_de_control Identificador
 * @property int $per_cal_doc 4-muy bueno,3 bueno,2 regular, 1 mala. P1: Calidad de los docentes
 * @property int $per_plan_es 4-muy bueno,3 bueno,2 regular, 1 mala. P2: Plan de Estudios
 * @property int $per_opr_part 4-muy bueno,3 bueno,2 regular, 1 mala. P3: Oportunidad de participar en proyectos de investigación y desarrollo
 * @property int $per_enf_inv 4-muy bueno,3 bueno,2 regular, 1 mala. P4: Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza
 * @property int $per_sat_con 4-muy bueno,3 bueno,2 regular, 1 mala. P5: Satisfacción con las condiciones de estudio (infraestructura)
 * @property int $per_exp_obt 4-muy bueno,3 bueno,2 regular, 1 mala. 6) Experiencia obtenida a través de la residencia profesional
 * @property int $per_tiempo_tran_prim_emp_id III.2 En caso de trabajar. tiempo transcurrido para obtener el primer empleo
 * @property string $per_fecha_registro Fecha de registro pertinencia
 *
 * @property TiempoPrimerEmpleo $perTiempoTranPrimEmp
 */
class Pertinencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pertinencia';
    }
    
    /**
     * behaviors
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_no_de_control', 'per_cal_doc', 'per_plan_es', 'per_opr_part', 'per_enf_inv', 'per_sat_con', 'per_exp_obt'], 'required'],
            [['per_cal_doc', 'per_plan_es', 'per_opr_part', 'per_enf_inv', 'per_sat_con', 'per_exp_obt', 'per_tiempo_tran_prim_emp_id'], 'integer'],
            [['per_fecha_registro'], 'safe'],
            [['per_no_de_control'], 'string', 'max' => 10],
            [['per_no_de_control'], 'unique'],
            //[['per_tiempo_tran_prim_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TiempoPrimerEmpleo::className(), 'targetAttribute' => ['per_tiempo_tran_prim_emp_id' => 'tie_pem_id']],
        ];
    }
    public static function findOneonly($username)
    {
        //return static::findOne(['est_no_de_control' => $username]); original
        return Pertinencia::find()
                ->where(['per_no_de_control' => $username])
                //->andWhere(['or',['est_estatus_alumno'=>'EGR'],['est_estatus_alumno'=>'TIT'],['est_estatus_alumno'=>'ACT']])
                ->one();
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_no_de_control' => 'Número de control del encuestado',
            'per_cal_doc' => '1. Calidad de los docentes',
            'per_plan_es' => '2. Plan de Estudios',
            'per_opr_part' => '3. Oportunidad de participar en proyectos de investigación y desarrollo',
            'per_enf_inv' => '4. Énfasis que se le prestaba a la investigación y desarrollo',
            'per_sat_con' => '5. Satisfacción con las condiciones de estudio (infraestructura)',
            'per_exp_obt' => '6. Experiecia obtenida a través de la residencia profesional',
            'per_tiempo_tran_prim_emp_id' => 'Tiempo transcurrido para obtener el primer empleo',
            'per_fecha_registro' => 'Fecha de registro de la encuesta',
            'updated_at'=> 'Fecha de Actualización',
            'tpe'=> 'Tiempo transcurrido para obtener el primer empleo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerTiempoTranPrimEmp()
    {
        return $this->hasOne(TiempoPrimerEmpleo::className(), ['tie_pem_id' => 'per_tiempo_tran_prim_emp_id']);
    }
    ///obtienes la referencia de datos 
    public static function getCaldoc($status,$valor,$sexo,$campo,$carrera,$periodo,$multicarrera=0){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('pertinencia,estudiantes');
        $query->where('pertinencia.`per_no_de_control`=estudiantes.`est_no_de_control`');
        if($carrera!="" && $multicarrera=='0'){
            $query->andWhere('estudiantes.est_carrera=:carrera');
        }else{
            $query->andWhere('estudiantes.est_carrera in ('.$carrera.')');
        }
        if($periodo!=""){
            $query->andWhere('estudiantes.est_ultimo_periodo_inscrito=:periodo');
        }
        //$query->andWhere('estudiantes.est_carrera=:carrera and estudiantes.est_ultimo_periodo_inscrito=:periodo');
        if($status=="EGRTIT"){
            $query->andWhere(['or','estudiantes.est_estatus_alumno="EGR"','estudiantes.est_estatus_alumno="TIT"']);
        }else{
            $query->andWhere('estudiantes.est_estatus_alumno=:status');
        }
        //$query->andwhere(['estudiantes.est_carrera=:carrera']);
        //$query->andwhere(['estudiantes.est_ultimo_periodo_inscrito=:periodo']);
        //reemplazar por switch me permite cambiar qué parámetro deseo contar
        switch($campo){
            case 'per_cal_doc':
            $query->andWhere('pertinencia.`per_cal_doc`=:valor');
            break;        
            case 'per_plan_es':
            $query->andWhere('pertinencia.`per_plan_es`=:valor');
            break;
            case 'per_opr_part':
            $query->andWhere('pertinencia.`per_opr_part`=:valor');
            break;
            case 'per_sat_con':
            $query->andWhere('pertinencia.`per_sat_con`=:valor');
            break;
            case 'per_enf_inv':
            $query->andWhere('pertinencia.`per_enf_inv`=:valor');
            break;
            case 'per_exp_obt':
            $query->andWhere('pertinencia.`per_exp_obt`=:valor');
            break;
            case 'per_tiempo_tran_prim_emp_id':
            $query->andWhere('pertinencia.`per_tiempo_tran_prim_emp_id`=:valor');
            break;
        } 
        //$query->andWhere('pertinencia.`per_cal_doc`=:valor');
        $query->andWhere('estudiantes.`est_sexo`=:sexo');
        if($status=="EGRTIT"){
        
        }else{
        $query->addParams([':status' => $status]);
        }
        $query->addParams([':valor' => $valor])
        ->addParams([':sexo' => $sexo]);
        if($carrera!=""){
            if($multicarrera=='1'){
                $aux_carrera= explode(',', $carrera);
                //echo "<br>".\yii\helpers\VarDumper::dump($aux_carrera)."<br>";
                //$query->addParams([':carrera' => $aux_carrera]);
                //$query->addParams([':carrera' => ]);
            }else{
                $query->addParams([':carrera' => $carrera]);
            }                        
        }
            
        if($periodo!=""){
            $query->addParams([':periodo' => $periodo]);   
        }
        //echo "".$query->createCommand()->getRawSql()."<br>";
        $raws=$query->count();
        return $raws;
    }
    public static function getPersonalCount($no_de_control){
        $query= new \yii\db\Query;       
        $query->select('*');
        $query->from('pertinencia');
        $query->where('pertinencia.`per_no_de_control`=:num');                        
        $query->addParams([':num' => $no_de_control]);
        $raws=$query->count();
        return $raws;
    }
    
    public function getTpe(){
        $modelte= TiempoPrimerEmpleo::findOne($this->per_tiempo_tran_prim_emp_id);
        return $modelte->tie_pem_nombre;
    }
}
