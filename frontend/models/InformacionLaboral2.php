<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informacion_laboral".
 *
 * @property int $inf_lab_id Id Información Laboral
 * @property string $inf_lab_fecha_ing_emp Fecha en la ingreso a la empresa
 * @property string $ing_lab_fecha_ter_emp Fecha en la que dejó de trabajar en la empresa
 * @property string $inf_lab_nombre_ji Nombre del jefe inmediato
 * @property string $inf_lab_puesto_ji Puesto del jefe inmediato
 * @property string $inf_lab_telefono_ji Teléfono del jefe inmediato
 * @property string $inf_lab_ext_ji Extensión del teléfono del jefe inmediato
 * @property string $inf_lab_email_ji e-mail del jefe inmediato
 * @property string $inf_lab_no_de_control Número de Control del Alumno
 * @property int $inf_lab_empresa_id Id de la empresa
 * @property int $inf_lab_medio_em_id Medio para obtener el empleo
 * @property string $inf_lab_otro_medio_em Otro medio para obtener el empleo
 * @property int $inf_lab_requisitos_con_id Requisitos de contratación
 * @property string $inf_lab_otro_requisitos_con Otros requisitos de contratación
 * @property int $inf_lab_nivel_jer_id Nivel jerárquico en el trabajo
 * @property int $inf_lab_ingreso_salario_id Ingreso (salario mínimo diario)
 * @property int $inf_lab_cond_tra_id Condición de trabajo
 * @property string $inf_lab_otro_cond_tra Otra condición de trabajo
 * @property int $inf_lab_rel_for 100%,80%,60%,40%,20%,0%. Relación del trabajo con su área de formación
 * @property int $inf_lab_idiomas_trabajo_id Idioma que utiliza en su trabajo
 * @property string $inf_lab_otro_idioma Otro idioma que utiliza en su trabajo
 * @property int $inf_lab_uso_ie_hablar Porcentaje de idioma extranjero que habla
 * @property int $inf_lab_uso_ie_escribir Porcentaje de idioma extranjero que escribe
 * @property int $inf_lab_uso_ie_leer Porcentaje de idioma extranjero que lee
 * @property int $inf_lab_uso_ie_escuchar Porcentaje de idioma extranjero que escucha
 * @property string $inf_lab_efi_rea_act ME -MUY EFICIENTE ,EF EFICIENTE ,PE POCO EFICIENTE ,DE DEFICIENTE. Eficiencia para realizar las actividades laborales, en relación con su formación académica
 * @property string $inf_lab_com_cal_for_aca ME -MUY EFICIENTE ,EF EFICIENTE ,PE POCO EFICIENTE ,DE DEFICIENTE. ¿Cómo califica su formación académica con respecto a su desempeño laboral
 * @property string $inf_lab_uti_res_pro ME -MUY EFICIENTE ,EF EFICIENTE ,PE POCO EFICIENTE ,DE DEFICIENTE. Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional
 * @property int $inf_lab_are_cam_est 1-poco, 5-mucho. Área o campo de estudio. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_titulacion 1-poco, 5-mucho. Titulación. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_exp_lab 1-poco, 5-mucho. Experiencia laboral/práctica (antes de egresar). Aspectos que valora la empresa para contraación
 * @property int $inf_lab_com_lab 1-poco, 5-mucho. Competencia laboral: Habilidad para resolver problemas, capacidad de análisis, habilidad para el aprendizaje, creatividad, administración del tiempo, capacidad de negociación, habilidades manuales, trabajo en equipo, iniciativa, honestidad, persistencia, etc. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_pos_int_egre 1-poco, 5-mucho. Posicionamiento de la insititución de egreso. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_con_idio_ext 1-poco, 5-mucho. Conocimiento de idiomas extrangeros. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_rec_ref 1-poco, 5-mucho. Recomendaciones / Referencias. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_per_act 1-poco, 5-mucho. Personalidad / actitudes. Aspectos que valora la empresa para contraación
 * @property int $inf_lab_cap_lid 1-poco, 5-mucho. Capacidad de liderazgo. Aspectos que valora la empresa para contraación
 * @property string $inf_lab_fecha_registro Fecha de registro de información laboral
 */
class InformacionLaboral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informacion_laboral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inf_lab_fecha_ing_emp', 'inf_lab_nombre_ji', 'inf_lab_puesto_ji', 'inf_lab_telefono_ji', 'inf_lab_email_ji', 'inf_lab_no_de_control', 'inf_lab_empresa_id', 'inf_lab_medio_em_id', 'inf_lab_requisitos_con_id', 'inf_lab_nivel_jer_id', 'inf_lab_cond_tra_id', 'inf_lab_rel_for', 'inf_lab_idiomas_trabajo_id', 'inf_lab_uso_ie_hablar', 'inf_lab_uso_ie_escribir', 'inf_lab_uso_ie_leer', 'inf_lab_uso_ie_escuchar', 'inf_lab_efi_rea_act', 'inf_lab_com_cal_for_aca', 'inf_lab_uti_res_pro', 'inf_lab_are_cam_est', 'inf_lab_titulacion', 'inf_lab_exp_lab', 'inf_lab_com_lab', 'inf_lab_pos_int_egre', 'inf_lab_con_idio_ext', 'inf_lab_rec_ref', 'inf_lab_per_act', 'inf_lab_cap_lid', 'inf_lab_fecha_registro'], 'required'],
            [['inf_lab_fecha_ing_emp', 'ing_lab_fecha_ter_emp', 'inf_lab_fecha_registro'], 'safe'],
            [['inf_lab_empresa_id', 'inf_lab_medio_em_id', 'inf_lab_requisitos_con_id', 'inf_lab_nivel_jer_id', 'inf_lab_ingreso_salario_id', 'inf_lab_cond_tra_id', 'inf_lab_rel_for', 'inf_lab_idiomas_trabajo_id', 'inf_lab_uso_ie_hablar', 'inf_lab_uso_ie_escribir', 'inf_lab_uso_ie_leer', 'inf_lab_uso_ie_escuchar', 'inf_lab_are_cam_est', 'inf_lab_titulacion', 'inf_lab_exp_lab', 'inf_lab_com_lab', 'inf_lab_pos_int_egre', 'inf_lab_con_idio_ext', 'inf_lab_rec_ref', 'inf_lab_per_act', 'inf_lab_cap_lid'], 'integer'],
            [['inf_lab_otro_requisitos_con'], 'string'],
            [['inf_lab_nombre_ji'], 'string', 'max' => 150],
            [['inf_lab_puesto_ji'], 'string', 'max' => 200],
            [['inf_lab_telefono_ji'], 'string', 'max' => 15],
            [['inf_lab_ext_ji', 'inf_lab_no_de_control'], 'string', 'max' => 10],
            [['inf_lab_otro_medio_em', 'inf_lab_otro_cond_tra', 'inf_lab_otro_idioma'], 'string', 'max' => 100],
            [['inf_lab_efi_rea_act', 'inf_lab_com_cal_for_aca', 'inf_lab_uti_res_pro'], 'string', 'max' => 2],
            [['inf_lab_email_ji'],'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        //Por María Luisa Montes
        return [
            'inf_lab_id' => 'Inf Lab ID',
            'inf_lab_fecha_ing_emp' => 'Fecha en la que ingresó a la empresa: ',
            'ing_lab_fecha_ter_emp' => 'Fecha en la que dejó de trabajar en la empresa:',
            'inf_lab_nombre_ji' => 'Nombre del jefe inmediato:',
            'inf_lab_puesto_ji' => 'Puesto del jefe inmediato:',
            'inf_lab_telefono_ji' => 'Teléfono del jefe inmediato:',
            'inf_lab_ext_ji' => 'Ext',
            'inf_lab_email_ji' => 'Correo del jefe inmediato:',
            'inf_lab_no_de_control' => 'Número de control del alumno:',
            'inf_lab_empresa_id' => 'Nombre de la empresa:',
            'inf_lab_medio_em_id' => 'Medio para obtener el empleo:',
            'inf_lab_otro_medio_em' => 'Otro:',
            'inf_lab_requisitos_con_id' => 'Requisitos de contratación:',
            'inf_lab_otro_requisitos_con' => 'Otros:',
            'inf_lab_nivel_jer_id' => 'Nivel jerárquico en el trabajo:',
            'inf_lab_ingreso_salario_id' => 'Ingreso (salario mínimo diario):',
            'inf_lab_cond_tra_id' => 'Condición de trabajo:',
            'inf_lab_otro_cond_tra' => 'Otra:',
            'inf_lab_rel_for' => 'Relación del trabajo con su área de formación:',
            'inf_lab_idiomas_trabajo_id' => 'Idioma que utiliza en su trabajo:',
            'inf_lab_otro_idioma' => 'Otro:',
            'inf_lab_uso_ie_hablar' => '% Habla',
            'inf_lab_uso_ie_escribir' => '% Escribe',
            'inf_lab_uso_ie_leer' => '% Lee',
            'inf_lab_uso_ie_escuchar' => '% Escucha',
            'inf_lab_efi_rea_act' => 'Eficiencia para realizar las actividades laborales, en relación con su formación académica:',
            'inf_lab_com_cal_for_aca' => '¿Cómo califica su formación académica con respecto a su desempeño laboral:',
            'inf_lab_uti_res_pro' => 'Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional:',
            'inf_lab_are_cam_est' => 'Área o campo de estudio',
            'inf_lab_titulacion' => 'Titulación',
            'inf_lab_exp_lab' => 'Experiencia laboral/práctica (antes de egresar)',
            'inf_lab_com_lab' => 'Competencia laboral: Habilidad para resolver problemas, capacidad de análisis, habilidad para el aprendizaje, creatividad, administración del tiempo, capacidad de negociación, habilidades manuales, trabajo en equipo, iniciativa, honestidad, persistencia, etc.',
            'inf_lab_pos_int_egre' => 'Posicionamiento de la insititución de egreso',
            'inf_lab_con_idio_ext' => 'Conocimiento de idiomas extranjeros',
            'inf_lab_rec_ref' => 'Recomendaciones / Referencias',
            'inf_lab_per_act' => 'Personalidad / actitudes',
            'inf_lab_cap_lid' => 'Capacidad de liderazgo',
            'inf_lab_fecha_registro' => 'Fecha de registro de información laboral:',
        ];
    }
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getinfLabEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['emp_id' => 'inf_lab_empresa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfLabMedioEm()
    {
        return $this->hasOne(MedioEm::className(), ['medio_em_id' => 'inf_lab_medio_em_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfLabRequisitosCon()
    {
        return $this->hasOne(RequisitosCont::className(), ['requisito_cont_id' => 'inf_lab_requisitos_con_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfLabNivelJer()
    {
        return $this->hasOne(NivelJer::className(), ['nivel_jer_id' => 'inf_lab_nivel_jer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfLabIngresoSalario()
    {
        return $this->hasOne(Ingreso::className(), ['ingreso_id' => 'inf_lab_ingreso_salario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfLabCondTra()
    {
        return $this->hasOne(CondTra::className(), ['cond_tra_id' => 'inf_lab_cond_tra_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfLabIdiomasTrabajo()
    {
        return $this->hasOne(IdiomasTrabajo::className(), ['idioma_tbj_id' => 'inf_lab_idiomas_trabajo_id']);
    }
}
