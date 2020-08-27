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

use library\Auth;

use library\HttpException;

use library\Url;

use models\BlogForm;

class ControllerBlog extends Controller{
        
    public $listposts ;
   
    
    public function actionIndex() {
        
        if (Url::getCountUrlSegments()>3 or
                Url::getCountUrlSegments()==1)
        {  
             
//              throw new HttpException('Forbitten','403           
//              throw new HttpException(');
//            $this->show404page();
     
        } elseif (Url::getCountUrlSegments()==2) {

            $nicknemesBlogera=Url::getSegment(1);
              
            $curPage=1;

        } elseif (Url::getCountUrlSegments()==3) {
            
        $nicknemesBlogera=Url::getSegment(1);
            
        $curPage=Url::getSegment(2);
                                   
              if  (substr($curPage, 0, 5)=='page-')
                
                    {  

                       $curPage=substr($curPage, 5)+0;
                    }                                                     
        }
                       
        $model = new BlogForm();
              
        $idBlogger=$model->getIdBloggerByName($nicknemesBlogera);        
        
        
        if (empty($idBlogger)) {
            
            
              throw new HttpException('Forbitten','403');
        }
        
        
            $model->_maxPageNum =$model->getMaxPageNumberForBloggerId('post',POST_FOR_PAGE, $idBlogger, $status='published');

            $model->_currentPage =$curPage;

            $model->_uripage ='blog/'.$nicknemesBlogera;                

            $model->listposts = $model->getPostByBloggerId($model->_currentPage,POST_FOR_PAGE,$idBlogger, $status='published');

            $this->_view->render('blogs',['model'=>$model]);
        
        
        
    }

}
