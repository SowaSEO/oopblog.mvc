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

//use library\Db;

use library\Auth;

use library\HttpException;

use library\Url;

use models\Post;

use models\PostForm;

use library\Request;


class ControllerPost extends Controller{
                
    public function actionIndex() {            
        
        $IdPost=Url::getSegment(1)+0;                      
        
        $model = new Post($IdPost); 
        
        if(Auth::isAdmin() and Isset($_POST['moderation'])){
            if ($_POST['moderation']=="publikuvaty")
            {
                
               $model->moderatiON($IdPost);
               
            } elseif ($_POST['moderation']=="deleted") 
            {
                
               $model->deletedON($IdPost);       
            }
            unset($_POST);
            
            header("Refresh: 0"); 
            
        }
                               
        if (empty($model->post)) { 
            
//            http_response_code(404);
            
            $this->_view->render('no_post',['model'=>$model]); }
        
        else $this->_view->render('post',['model'=>$model]);
                
    }            
    
        
    public function actionAddpost() {
        
        if (!Auth::isGuest()) {
            
            $model= new PostForm();
            
            if(Request::isPost()){
                
                $model->load(Request::getPost());                        
                
                if($model->load(Request::getPost()) and $model->validate())
                {
                    
                    if($model->save()){
                                                
                        unset($_POST);
                        
                        header('location: //oopblog.mvc/post/'.$model->id);
                        
                    }
                } 
            }
                                                                 
            $this->_view->render('newpost',['model'=>$model]);
                                    
        }else{
            
            throw new HttpException('Forbitten','403');
              
        }    
        
    }
//-----------------------------------------------------------------------------        
//    public function getPostById($idpost) {                
//        
//    }
    
    public function actionEditpost() {
        
        if (!Auth::isGuest()) {
            
            $postId = url::getSegment(2)+0;
            
//            $IdPost=Url::getSegment(2)+0;         
            
            $post = new Post($postId);
            
            $model = new PostForm();
            
            $model->id=$post->id;
            
            $model->title = $post->title;
            
            $model->content = $post->content;
            
            if(Request::isPost()){
                
                if($model->load(Request::getPost()) and $model->validate()){
                    
                    if($model->update()){
                        
                        header('location: /oopblog.mvc/view/'.$model->id);
                    }
                } 
            }
                                
//            $this->_view->render('PostForm',['model'=>$model]);                       
            $this->_view->render('newpost',['model'=>$model]);            
        }else{
            
            throw new HttpException('Forbitten','403 ');            
        }            
    }    
              
}
