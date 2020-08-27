<?php
/**
 * Description of controllerMain
 *
 * @author User
 */

namespace controllers;

use base\Controller;

//use library\Db;
//
//use library\HttpException;

//use library\Auth;
//
//use models\LoginForm;
//
//use models\RegisterForm;
//
//use library\Request;

//use library\Validator;

class ControllerMain extends Controller{
    
    public function actionIndex() {
                
        $this->_view->setTitle('БЛОГ на ООП Перший БЛОГ на ООП');
                
        $this->_view->setH1('Перший БЛОГ на ООП php');             
        
        $this->_view->render('home',[]);        
                        
    }
   
//    public function actionlogin() {
//        
//       if (Auth::isGuest()){
//            
//            $model = new LoginForm();
//            if(Request::isPost()){             
//                if($model->load(Request::getPost()) and $model->validate())
//                                  
//                {
////     echo '<hr>ЄЄЄЄЄЄЄЄЄ1OK Validate OK actionlogin()  Validate OK<hr>';                   // var_dump( $model->load(Request::getPost() );
////                    
//                    if ($model->doLogin()){
//                        
//                        header("Location: /");                        
//                    }
//                } 
//                
////                else {  echo 'NOT VALIDATE ';}
//            }
//
//            $this->_view->setTitle('Login');        
//            
//            $this->_view->setH1('Авторизація  на Перший БЛОГ');
//            
//            $this->_view->render('login',['model'=>$model]);
//            
//        }else {
//            throw new HttpException('Forbidden','403');
//        }
//                
//    } 
//            
//    public function actionRegister() {
//        
//        if(Auth::isGuest()){
//            
//            $model = new RegisterForm();
//            
//            if(Request::isPost()){
//                
////                $myPost=[];
//                
//                $myPost= $model->load(Request::getPost());
//                
//                if ( $model->load(Request::getPost())) {
//                    
//                    echo '<br>load(Request::getPost() if ( $model->load(Request::getPost()))';
//                    
//                    if ($model->validate()) {
//        
//                        echo 'ACTION REGISTRATION -if ($model->validate()) {';
//                        
//                        if($model->doRegister()){
//                        
//                            header ('Location: /' );
//                        }
//                        
//                    }
//                }
//            }
//            
//            $this->_view->render('registration',['model'=>$model]);
//            
//        }else {
//            throw new HttpException('Forbidden','403');
//        }        
//    }    
}