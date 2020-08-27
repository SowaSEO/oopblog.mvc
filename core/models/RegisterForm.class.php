<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models;

use base\BaseForm;

/**
 * Description of RegisterForm
 *
 * @author User
 */
class RegisterForm  extends BaseForm{
    
    public $nickname;
    public $email;
    public $password;
    public $password_confirm;
    
    protected $_tableName ='user';

    public function getRules() {
        
        return [                                            
                'nickname'=>['required','unique'],
                'email'=>['required','email'],
                'password'=>['required']
        ];
    }
    
    public function doRegister() {        
        echo 'public function doRegister() {';        
//        $password=md5($this->password);        
        
        $password= md5($this->password.SECRETKEY);
                
        $sql="Insert INTO user (nickname, email, password) VALUE ('{$this->nickname}','{$this->email}','{$password}')" ;        
//        echo '<br> $sql='.$sql ;
        
        $res = $this->_db->sendInsUpDelQuery($sql);
        if (!$res) {
     
            $this->_errors['register'] = 'Error';
            return false;
            
        }
    }
    
    
//      public function validate() {
//        echo '<hr>validate()<br>';
//                
//    }
//    
//    public function load($data) {
//        
//        echo '<hr>!!!!!!!!!!!!!!!!load($data) <br>';
//        
//        var_dump($data);
//        $this->nickname = $this->_db->getSafeData($data['nickname']);
//        
//        $this->email = $this->_db->getSafeData($data['email']);
//        
//        $this->password = $this->_db->getSafeData($data['password']);
//        
//          echo '<hr>ПІсля getSafeData <br>';
//          
//        var_dump($this->nickname);        echo '<br>';
//        var_dump($this->email);echo '<br>';
//        var_dump($this->password);echo '<br>';
//    }
}
