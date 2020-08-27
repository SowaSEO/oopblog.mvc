<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginForm
 *
 * @author User
 */
namespace models;

use base\BaseForm;

use library\Auth;

class loginForm extends BaseForm{
    
    public $email;
    public $password;
    
    protected $_tableName ='user';
    
    public function getrules() {
        return 
        [
            'email'=>['required','email'],
            
            'password'=>['required']
        ];
    }
        
    public function doLogin() {
        
        $password= md5($this->password.SECRETKEY);
                
        $sql="SELECT id,role, nickname FROM user WHERE email='{$this->email}' and password= '{$password}'";
        
        $result = $this->_db->sendSelectQuery($sql);
        
        if($result->num_rows >0){
            
            $user= $result->fetch_assoc();
            
            Auth::login($user['id'],$user['role'],$user['nickname']);
            
            return true;  
            
        }else{
            
            return false;
        }
        
    }
                    
//    public function validate() {
//        echo '<hr>validate()<br>';
//                
//    }
//    
//    public function load($data) {
//        
//        echo '<hr>!!!!!!!!!!!!!!!!load($data) <br>';
//        
//        var_dump($data);
//        
//        $this->login = $this->_db->getSafeData($data['email']);
//        
//        $this->password = $this->_db->getSafeData($data['password']);
//        
//          echo '<hr>ПІсля getSafeData <br>';
//        var_dump($this->login);
//        var_dump($this->password);
//    }
//    
//        
    //put your code here
}
