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
    
    public $login;
    public $psaword;
    public $password_confirm;
    
    protected $_tableName ='user';


    public function getRules() {
        
        return [ 
            'login'=>['required','email','unique'],
            
            'password'=>['required','confirm']
        ];
    }
        
    public function doRegister() {
        
        echo 'public function doRegister() {';
        
        $password=md5($this->password);
        
        $sql="Insert INTO user (login, password) VALUE ('{$this->login}','{$password}')" ;
        
        $res = $this->_db->sendInsUpDelQuery($sql);
        if (!$res) {
            $this->_errors['register'] = 'Error';
            
            return false;
        }
        
    }
    //put your code here
}
