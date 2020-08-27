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

use models\RegisterForm;

use library\Request;


class ControllerRegister extends Controller{
    
    public function actionIndex() {
        
                if(Auth::isGuest()){
            
            $model = new RegisterForm();
            
            if(Request::isPost()){
                
                $myPost= $model->load(Request::getPost());
                
                if ( $model->load(Request::getPost())) {
                    
                    echo '<br>load(Request::getPost() if ( $model->load(Request::getPost()))';
                    
                    if ($model->validate()) {
        
                        echo 'ACTION REGISTRATION -if ($model->validate()) {';
                        
                        if($model->doRegister()){
                        
                            header ('Location: /' );
                        }
                        
                    }
                }
            }
            
            $this->_view->render('registration',['model'=>$model]);
            
        }else {
            throw new HttpException('Forbidden','403');
        }
    }
   
}