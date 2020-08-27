<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers;

/**
 * Description of ControllerPost
 *
 * @author User
 */
use base\Controller;
//
//use library\Auth;

use models\BloggersForm;

class ControllerBloggers extends Controller{
    
    public function actionIndex() {                
               
            $this->_view->setTitle('БЛОГИ на ООП ');
            
            $this->_view->setH1('Наші автори');
                     
            $model = new BloggersForm();
           
            $model->_uripage ='/blog';  
            
            $model->posts= $model->getAllBloggers();
                                                    
            $this->_view->render('bloggers',['model'=>$model]);
    }

}
