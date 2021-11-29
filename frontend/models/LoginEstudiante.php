<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;

use Yii;
use yii\base\Model;
use common\models\Estudiantes;
/*codigo agregado por jesus eduardo*/
use yii\bootstrap\Alert;
/**/
/**
 * Login form
 */
//variables de session 'alumno_co_cntrl' y 'nip'
class LoginEstudiante extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
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
            'username' => 'Número de control',
            'password' => 'NIP',
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
            if (!$user || !$user->validatePassword($this->password)|| !$this->password=='admin') {
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
           // return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            /*codigo jesus eduardo*/
           // return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            $user = $this->getUser();
            $session = Yii::$app->session;
            $session->set('usuario', $this->username);
            $session->set('rol',$user->est_estatus_alumno);
            $session->set('nombre',$user->est_nombre_alumno);
            $session->set('sexo',$user->est_sexo);

            Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
           
            // check if a session is already open
            if ($session->isActive){
                return true;
            }else{
                //$session}
                return false;
            }

            // open a session
            $session->open();

                        /**/
            
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
            $this->_user = Estudiantes::findByUsername($this->username);
        }
        

        return $this->_user;
    }
}
