<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Usuario ó Número de Control',
            'rememberMe' => 'Recuerdame',
            'password' => 'Contraseña ó Nip',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            
            //sesion del usuario
            $user = $this->getUser();
            $session = Yii::$app->session;
            
            if($user->role=='ACT' || $user->role=='EGR' || $user->role=='TIT'){
            $est= Estudiantes::findByUsername($user);
            $session->set('usuario', $est->est_no_de_control);
            $session->set('rol',$est->est_estatus_alumno);
            $session->set('nombre',$est->est_nombre_alumno);
            $session->set('sexo',$est->est_sexo);
            }else if($user->role=='EMP'){
                //logueo de empresa

            $session->set('usuario', $this->username);
            $session->set('rol',$user->role);
            //$session->set('nombre',$est->est_nombre_alumno);
            //$session->set('sexo',$est->est_sexo);

            }else if($user->role=='SEG' || $user->role=='DAC' || $user->role=='GTV'  ){
                //logueo de empresa
                $session->set('id', $user->id);
                $session->set('usuario', $this->username);
                $session->set('rol',$user->role);
                //$session->set('nombre',$est->est_nombre_alumno);
                //$session->set('sexo',$est->est_sexo);

            }


            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
