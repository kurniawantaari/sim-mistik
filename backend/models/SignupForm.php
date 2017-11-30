<?php

namespace backend\models;

use yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $nama;
    public $nip_baru;
    public $satker;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username telah digunakan.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Anda telah terdaftar sebagai user.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],

            [['satker'], 'required'],
            [['satker'], 'string', 'max' => 255],

            [['nip_baru'], 'required'],
            [['nip_baru'], 'string', 'max' => 18],
            [['nip_baru'], 'unique','targetClass' => '\common\models\User', 'message' => 'Anda telah terdaftar sebagai user.'],
        ];
    }
   /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'nama' => Yii::t('app', 'Nama Lengkap'),
            'nip_baru' => Yii::t('app', 'NIP Baru'),
            'sarker' => Yii::t('app', 'Satuan Kerja'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }
  
        $user = new User();
        $user->username = $this->username;
        $user->nama = $this->nama;
        $user->nip_baru = $this->nip_baru;
        $user->satker = $this->satker;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
       
        return $user->save(false) ? $user : null;
    }

}
