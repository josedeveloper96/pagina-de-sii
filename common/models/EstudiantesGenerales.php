<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estudiantes_generales".
 *
 * @property string $est_gral_no_de_control
 * @property int $est_gral_lugar_nacimiento
 * @property string $est_gral_domicilio_calle
 * @property string $est_gral_domicilio_colonia
 * @property string $est_gral_ciudad
 * @property int $est_gral_entidad_federativa
 * @property int $est_gral_codigo_postal
 * @property string $est_gral_telefono
 * @property string $est_gral_nombre_padre
 * @property string $est_gral_ocupacion_padre
 * @property string $est_gral_domicilio_calle_padre
 * @property string $est_gral_domicilio_colonia_padre
 * @property string $est_gral_domicilio_ciudad_padre
 * @property int $est_gral_domicilio_entidad_fed_padre
 * @property string $est_gral_domicilio_telefono_padre
 * @property string $est_gral_nombre_madre
 * @property string $est_gral_ocupacion_madre
 * @property string $est_gral_domicilio_calle_madre
 * @property string $est_gral_domicilio_colonia_madre
 * @property string $est_gral_domicilio_ciudad_madre
 * @property int $est_gral_domicilio_entidad_fed_madre
 * @property string $est_gral_domicilio_telefono_madre
 * @property string $est_gral_nombre_empresa
 * @property string $est_gral_cargo_desempenado
 * @property double $est_gral_ingreso_mensual
 * @property int $est_gral_turno
 * @property string $est_gral_antiguedad
 * @property string $est_gral_nombre_jefe
 * @property string $est_gral_domicilio_calle_empresa
 * @property string $est_gral_domicilio_colonia_empresa
 * @property string $est_gral_domicilio_ciudad_empresa
 * @property int $est_gral_domicilio_entidad_fed_empresa
 * @property string $est_gral_domicilio_telefono_empresa
 * @property string $est_gral_nombre_esposa
 * @property string $est_gral_ocupacion_esposa
 * @property int $est_gral_no_dependientes
 * @property string $est_gral_comunidad_indigena
 * @property string $est_gral_lengua_indigena
 */
class EstudiantesGenerales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiantes_generales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_gral_no_de_control'], 'required'],
            [['est_gral_lugar_nacimiento', 'est_gral_entidad_federativa', 'est_gral_codigo_postal', 'est_gral_domicilio_entidad_fed_padre', 'est_gral_domicilio_entidad_fed_madre', 'est_gral_turno', 'est_gral_domicilio_entidad_fed_empresa', 'est_gral_no_dependientes'], 'integer'],
            [['est_gral_ingreso_mensual'], 'number'],
            [['est_gral_no_de_control'], 'string', 'max' => 10],
            [['est_gral_domicilio_calle', 'est_gral_nombre_padre', 'est_gral_domicilio_calle_padre', 'est_gral_nombre_madre', 'est_gral_domicilio_calle_madre', 'est_gral_cargo_desempenado', 'est_gral_nombre_jefe', 'est_gral_domicilio_calle_empresa', 'est_gral_nombre_esposa'], 'string', 'max' => 60],
            [['est_gral_domicilio_colonia', 'est_gral_domicilio_colonia_padre', 'est_gral_domicilio_colonia_madre', 'est_gral_domicilio_colonia_empresa'], 'string', 'max' => 40],
            [['est_gral_ciudad', 'est_gral_telefono', 'est_gral_domicilio_ciudad_padre', 'est_gral_domicilio_telefono_padre', 'est_gral_domicilio_ciudad_madre', 'est_gral_domicilio_telefono_madre', 'est_gral_antiguedad', 'est_gral_domicilio_ciudad_empresa', 'est_gral_domicilio_telefono_empresa'], 'string', 'max' => 30],
            [['est_gral_ocupacion_padre', 'est_gral_ocupacion_madre', 'est_gral_ocupacion_esposa'], 'string', 'max' => 50],
            [['est_gral_nombre_empresa', 'est_gral_comunidad_indigena', 'est_gral_lengua_indigena'], 'string', 'max' => 100],
            [['est_gral_no_de_control'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_gral_no_de_control' => 'Est Gral No De Control',
            'est_gral_lugar_nacimiento' => 'Est Gral Lugar Nacimiento',
            'est_gral_domicilio_calle' => 'Est Gral Domicilio Calle',
            'est_gral_domicilio_colonia' => 'Est Gral Domicilio Colonia',
            'est_gral_ciudad' => 'Est Gral Ciudad',
            'est_gral_entidad_federativa' => 'Est Gral Entidad Federativa',
            'est_gral_codigo_postal' => 'Est Gral Codigo Postal',
            'est_gral_telefono' => 'Est Gral Telefono',
            'est_gral_nombre_padre' => 'Est Gral Nombre Padre',
            'est_gral_ocupacion_padre' => 'Est Gral Ocupacion Padre',
            'est_gral_domicilio_calle_padre' => 'Est Gral Domicilio Calle Padre',
            'est_gral_domicilio_colonia_padre' => 'Est Gral Domicilio Colonia Padre',
            'est_gral_domicilio_ciudad_padre' => 'Est Gral Domicilio Ciudad Padre',
            'est_gral_domicilio_entidad_fed_padre' => 'Est Gral Domicilio Entidad Fed Padre',
            'est_gral_domicilio_telefono_padre' => 'Est Gral Domicilio Telefono Padre',
            'est_gral_nombre_madre' => 'Est Gral Nombre Madre',
            'est_gral_ocupacion_madre' => 'Est Gral Ocupacion Madre',
            'est_gral_domicilio_calle_madre' => 'Est Gral Domicilio Calle Madre',
            'est_gral_domicilio_colonia_madre' => 'Est Gral Domicilio Colonia Madre',
            'est_gral_domicilio_ciudad_madre' => 'Est Gral Domicilio Ciudad Madre',
            'est_gral_domicilio_entidad_fed_madre' => 'Est Gral Domicilio Entidad Fed Madre',
            'est_gral_domicilio_telefono_madre' => 'Est Gral Domicilio Telefono Madre',
            'est_gral_nombre_empresa' => 'Est Gral Nombre Empresa',
            'est_gral_cargo_desempenado' => 'Est Gral Cargo Desempenado',
            'est_gral_ingreso_mensual' => 'Est Gral Ingreso Mensual',
            'est_gral_turno' => 'Est Gral Turno',
            'est_gral_antiguedad' => 'Est Gral Antiguedad',
            'est_gral_nombre_jefe' => 'Est Gral Nombre Jefe',
            'est_gral_domicilio_calle_empresa' => 'Est Gral Domicilio Calle Empresa',
            'est_gral_domicilio_colonia_empresa' => 'Est Gral Domicilio Colonia Empresa',
            'est_gral_domicilio_ciudad_empresa' => 'Est Gral Domicilio Ciudad Empresa',
            'est_gral_domicilio_entidad_fed_empresa' => 'Est Gral Domicilio Entidad Fed Empresa',
            'est_gral_domicilio_telefono_empresa' => 'Est Gral Domicilio Telefono Empresa',
            'est_gral_nombre_esposa' => 'Est Gral Nombre Esposa',
            'est_gral_ocupacion_esposa' => 'Est Gral Ocupacion Esposa',
            'est_gral_no_dependientes' => 'Est Gral No Dependientes',
            'est_gral_comunidad_indigena' => 'Est Gral Comunidad Indigena',
            'est_gral_lengua_indigena' => 'Est Gral Lengua Indigena',
        ];
    }
}
