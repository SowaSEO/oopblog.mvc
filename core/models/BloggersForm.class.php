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

class BloggersForm extends BaseForm{
    
    public $posts;                   
    
    public function getrules() {
//        [];
    }
                    
    public function getAllBloggers() {      
    
        $sql="SELECT DISTINCT user.nickname FROM user LEFT JOIN post ON user.id = post.author_id where  status > 0  ";

        $result = $this->_db->sendSelectQuery($sql);
            
        $posts = $result->fetch_all(MYSQLI_ASSOC);
                        
        return $posts ;
         
    }
    
            
    public function getMaxPageNumber($table, $postPerPage, $status='published') {
    
        $addWhere=getAddWhereByStatus($status);
        
        if (!empty($addWhere)) {
            
            $addWhere=' WHERE '.$addWhere;
            
        } 

        $sql=" SELECT COUNT(*) FROM $table $addWhere";     

        $countP = selectData($sql)->fetch_row();

        return ceil($countP['0']/$postPerPage);
    
    }
    
    
function getAllBlogs($status='published') {
    
    $addWhere=getAddWhereByStatus($status);
     
    if (!empty($addWhere)) {$addWhere=' WHERE '.$addWhere;;} 
  
    $sql ="SELECT * FROM post LEFT JOIN user ON post.author_id = user.id $addWhere";
  
    $result=$this->_db->sendSelectQuery($sql);     
    
    return mysqli_fetch_all($mypost,MYSQLI_ASSOC);
}


    
                    
    public function validate() {
                
    }

    
    public function load($data) {
              
    }
            
    //put your code here
}
