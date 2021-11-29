<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Estudiantes;

/**
 * SegestudiantesSearch represents the model behind the search form of `common\models\Estudiantes`.
 */


/*
$carrera=;
$reticula=;*/
class SegestudiantesSearch extends Estudiantes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_no_de_control', 'est_carrera', 'est_nivel_escolar', 'est_especialidad', 'est_clave_interna', 'est_estatus_alumno', 'est_plan_de_estudios', 'est_apellido_paterno', 'est_apellido_materno', 'est_nombre_alumno', 'est_curp_alumno', 'est_fecha_nacimiento', 'est_sexo', 'est_estado_civil', 'est_periodo_ingreso_it', 'est_ultimo_periodo_inscrito', 'est_tipo_servicio_medico', 'est_clave_servicio_medico', 'est_escuela_procedencia', 'est_domicilio_escuela', 'est_correo_electronico', 'est_foto', 'est_firma', 'est_becado_por', 'est_tipo_alumno', 'est_nacionalidad', 'est_usuario', 'est_fecha_actualizacion'], 'safe'],
            [['est_reticula', 'est_semestre', 'est_tipo_ingreso', 'est_creditos_aprobados', 'est_creditos_cursados', 'est_tipo_escuela', 'est_entidad_procedencia', 'est_ciudad_procedencia', 'est_periodos_revalidacion', 'est_indice_reprobacion_acumulado', 'est_nip'], 'integer'],
            [['est_promedio_periodo_anterior', 'est_promedio_aritmetico_acumulado', 'est_promedio_final_alcanzado'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {





//obtener los tipos de solicitudes
    $id=Yii::$app->session['id'];
    $es = (new \yii\db\Query())
        ->select("c.carr_carrera,c.carr_reticula,c.carr_nombre_reducido")
        ->from('user_carreras uc, carreras c')
        ->where("uc.usc_user_id=$id and uc.usc_carrera=c.carr_carrera and uc.usc_reticula=c.carr_reticula")
        ->all();
//$nombre="{$es['est_nombre_alumno']} {$es['est_apellido_paterno']} {$es['est_apellido_materno']}";

    $n=0;$filtro='';
    foreach($es as $c){

        if($n > 0){
            $filtro.=' or ';
        }

        $filtro.="(est_carrera='{$c['carr_carrera']}' and est_reticula={$c['carr_reticula']})";

        $n=$n+1;
    }

//




        //$query = Estudiantes::find()->where(['carr_carrera' => '14','carr_reticula' => 15])->all();
        $query = Estudiantes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

       // $query->orFilterWhere(['est_carrera'=>'14','est_reticula'=>15,'est_carrera'=>'24','est_reticula'=>4]);
        $query->andWhere($filtro);

        $query->andWhere("est_estatus_alumno='TIT' or est_estatus_alumno='EGR' or est_estatus_alumno='ACT'");

        $query->andFilterWhere([
            'est_reticula' => $this->est_reticula,
            'est_semestre' => $this->est_semestre,
            'est_fecha_nacimiento' => $this->est_fecha_nacimiento,
            'est_tipo_ingreso' => $this->est_tipo_ingreso,
            'est_promedio_periodo_anterior' => $this->est_promedio_periodo_anterior,
            'est_promedio_aritmetico_acumulado' => $this->est_promedio_aritmetico_acumulado,
            'est_creditos_aprobados' => $this->est_creditos_aprobados,
            'est_creditos_cursados' => $this->est_creditos_cursados,
            'est_promedio_final_alcanzado' => $this->est_promedio_final_alcanzado,
            'est_tipo_escuela' => $this->est_tipo_escuela,
            'est_entidad_procedencia' => $this->est_entidad_procedencia,
            'est_ciudad_procedencia' => $this->est_ciudad_procedencia,
            'est_periodos_revalidacion' => $this->est_periodos_revalidacion,
            'est_indice_reprobacion_acumulado' => $this->est_indice_reprobacion_acumulado,
            'est_nip' => $this->est_nip,
            'est_fecha_actualizacion' => $this->est_fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'est_no_de_control', $this->est_no_de_control])
            ->andFilterWhere(['like', 'est_carrera', $this->est_carrera])
            ->andFilterWhere(['like', 'est_nivel_escolar', $this->est_nivel_escolar])
            ->andFilterWhere(['like', 'est_especialidad', $this->est_especialidad])
            ->andFilterWhere(['like', 'est_clave_interna', $this->est_clave_interna])
            ->andFilterWhere(['like', 'est_estatus_alumno', $this->est_estatus_alumno])
            ->andFilterWhere(['like', 'est_plan_de_estudios', $this->est_plan_de_estudios])
            ->andFilterWhere(['like', 'est_apellido_paterno', $this->est_apellido_paterno])
            ->andFilterWhere(['like', 'est_apellido_materno', $this->est_apellido_materno])
            ->andFilterWhere(['like', 'est_nombre_alumno', $this->est_nombre_alumno])
            ->andFilterWhere(['like', 'est_curp_alumno', $this->est_curp_alumno])
            ->andFilterWhere(['like', 'est_sexo', $this->est_sexo])
            ->andFilterWhere(['like', 'est_estado_civil', $this->est_estado_civil])
            ->andFilterWhere(['like', 'est_periodo_ingreso_it', $this->est_periodo_ingreso_it])
            ->andFilterWhere(['like', 'est_ultimo_periodo_inscrito', $this->est_ultimo_periodo_inscrito])
            ->andFilterWhere(['like', 'est_tipo_servicio_medico', $this->est_tipo_servicio_medico])
            ->andFilterWhere(['like', 'est_clave_servicio_medico', $this->est_clave_servicio_medico])
            ->andFilterWhere(['like', 'est_escuela_procedencia', $this->est_escuela_procedencia])
            ->andFilterWhere(['like', 'est_domicilio_escuela', $this->est_domicilio_escuela])
            ->andFilterWhere(['like', 'est_correo_electronico', $this->est_correo_electronico])
            ->andFilterWhere(['like', 'est_foto', $this->est_foto])
            ->andFilterWhere(['like', 'est_firma', $this->est_firma])
            ->andFilterWhere(['like', 'est_becado_por', $this->est_becado_por])
            ->andFilterWhere(['like', 'est_tipo_alumno', $this->est_tipo_alumno])
            ->andFilterWhere(['like', 'est_nacionalidad', $this->est_nacionalidad])
            ->andFilterWhere(['like', 'est_usuario', $this->est_usuario]);

        return $dataProvider;
    }
}
