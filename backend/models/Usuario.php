<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class Usuario extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;
    public $status;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','role','status'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este username ya existe.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email ya esta en uso.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    
    
    
     public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        
        return $user->save(); 

    }
    
     protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
    public static  function sendEmail2($email){

       

        $msj='
        
       
        <br>DEL INSTITUTO TECNOLÓGICO DE REYNOSA 
        <br>PRESENTE</b>
        <br><br>
        Los servicios educativos de este Instituto Tecnológico deben estar en mejora continua para asegurar la pertinencia de los conocimientos adquiridos y mejorar sistemáticamente, para colaborar en forma integral de nuestros alumnos.
        <br>
        <br>
        Para esto es indispensable tomarte en cuenta como factor de cambios y reformas, por lo que por este medio solicitamos tu valiosa participación y cooperación en esta investigación del, que nos permitirá obtener información para analizar la problemática del mercado laboral y sus características, así como las competencias laborales de nuestros
        <br>
        <br>
    
        Con nuestro agradecimiento por tu cooperación, recibe un cordial saludo.
        <br>
        <br>
        
       <b> A T E N T A M E N T E</b>
       <br>Educación Superior Tecnológica, un Compromiso con México®
        
        
       <br>
       <br> 
        <b>MTRA. MARA GRASSIEL ACOSTA GONZÁLEZ
        <br>DIRECTORA DEL INSTITUTO TECNOLÓGICO DE REYNOSA</b>';

        \Yii::$app->mailer->htmlLayout = "layouts/html";
        return Yii::$app->mailer->compose()
        ->setFrom(['plan_reynosa@tecnm.mx' => Yii::$app->name])
        ->setTo($email)
        ->setSubject('Cordial invitación al del IT Reynosa')
    ->setTextBody('Plain text content')
    ->setHtmlBody($msj)

        ->send();


        /*  */
    }
}