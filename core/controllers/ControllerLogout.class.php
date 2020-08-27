<?php
/**
 * Авторизація користувача на сайті 
 *
 * @author User
 */

namespace controllers;

use base\Controller;

use library\HttpException;

use library\Auth;



class ControllerLogout extends Controller{
    
    public function actionIndex() {

        if (!Auth::isGuest()){
            
            Auth::logout();            
            
         header("Location: /");             
            
        }else {
            throw new HttpException('Forbidden','403');
        }
        
    }
  
}