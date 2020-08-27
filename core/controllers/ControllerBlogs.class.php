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

use library\Url;

use models\BlogsForm;

class ControllerBlogs extends Controller{
        
    public $listposts ;


    public function actionIndex() {
        
        if (Url::getCountUrlSegments()>2)
        { // Нема такоъ сторІнки 
//             на 404
            
        } elseif (Url::getCountUrlSegments()==2) {

            $curPage=Url::getSegment(1);           
                
                if  (substr($curPage, 0, 5)=='page-')
                                
                    {                      
                       $curPage=substr($curPage, 5)+0;
                    }                                         
                                
        } else {
            
            $curPage=1;
        }
                                            
        $model = new BlogsForm();
                
        $model->_maxPageNum =$model->getMaxPageNumber('post',POST_FOR_PAGE , 'published');
                                
        $model->_currentPage =$curPage;
        
        $model->_uripage ='blogs';                
                
        $model->listposts = $model->getpostForPage($model->_currentPage,POST_FOR_PAGE,'published');
                  
        $this->_view->render('blogs',['model'=>$model]);
    }            
    
    public function actionModerationpost() {
        
        if (Auth::isGuest()){ 
            // додому нема права
            
        }        
                
        if (Url::getCountUrlSegments()>3) // номер сторінким
        { // Нема такоъ сторІнки 
//             на 404
            
        } elseif (Url::getCountUrlSegments()==3) {

            $curPage=Url::getSegment(2);
                
                if  (substr($curPage, 0, 5)=='page-')
                
                    {  
                    
                       $curPage=substr($curPage, 5)+0;
                    }                                                                         
        } else {
            
            $curPage=1;
        }
                                            
        $model = new BlogsForm();              

        $model->_maxPageNum =$model->getMaxPageNumber('post', POST_FOR_PAGE , 'moderation');                        
        
        $model->_currentPage =$curPage;
        
        $model->_uripage ='blogs/moderationpost';                        
        
        $model->listposts = $model->getpostForPage($model->_currentPage,POST_FOR_PAGE,'moderation');
                  
        $this->_view->render('blogs',['model'=>$model]);
    }
                   
    public function actionDeletedpost() {
        
        if (Auth::isGuest()){
            // додому нема права
            
        }        
                
        if (Url::getCountUrlSegments()>3) // номер сторінким
        { // Нема такоъ сторІнки 
//             на 404
            
        } elseif (Url::getCountUrlSegments()==3) {

            $curPage=Url::getSegment(2);

                
                if  (substr($curPage, 0, 5)=='page-')
                
                    {  echo '<br> substr($curPage, 5)'.substr($curPage, 5); 
                    
                       $curPage=substr($curPage, 5)+0;
                    }                                                             
            
        } else {
            
            $curPage=1;
        }
                                            
        $model = new BlogsForm();              

        $model->_maxPageNum =$model->getMaxPageNumber('post', POST_FOR_PAGE , 'deleted');                        
        
        $model->_currentPage =$curPage;
        
        $model->_uripage ='blogs/deletedpost';                        
                
        $model->listposts = $model->getpostForPage($model->_currentPage,POST_FOR_PAGE,'deleted');
                  
        $this->_view->render('blogs',['model'=>$model]);
    }
                         
    public function actionALLpost() {
        
        if (Auth::isGuest()){
            // додому нема права            
        }        
                
        if (Url::getCountUrlSegments()>3) // номер сторінким
        { // Нема такоъ сторІнки 
//             на 404
            
        } elseif (Url::getCountUrlSegments()==3) {

            $curPage=Url::getSegment(2);
            
              echo '<br> curPage='.$curPage;
              
              
              echo '<br> substr($curPage, 0, 5)'.substr($curPage, 0, 5);
                
                if  (substr($curPage, 0, 5)=='page-')
                
                    {  echo '<br> substr($curPage, 5)'.substr($curPage, 5); 
                    
                       $curPage=substr($curPage, 5)+0;
                    }                                                             
            
        } else {
            
            $curPage=1;
        }
                                            
        $model = new BlogsForm();              

        $model->_maxPageNum =$model->getMaxPageNumber('post', POST_FOR_PAGE , 'all');                        
        
        $model->_currentPage =$curPage;
        
        $model->_uripage ='blogs/allpost';                        
                
        $model->listposts = $model->getpostForPage($model->_currentPage,POST_FOR_PAGE,'all');
                  
        $this->_view->render('blogs',['model'=>$model]);
    }
                                                            
}