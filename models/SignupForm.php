<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $login;
    public $name;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [           
            ['login', 'filter', 'filter' => 'trim'],
            [['login','password','name'], 'required'],
            ['login', 'email'],
            ['login', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6]
        ];
    }

    
    
     public function attributeLabels()
    {
        return [
            'login' => 'Login (Email)',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->login = $this->login;
            $user->name = $this->name;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
