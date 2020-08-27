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


//use library\Db;

use base\BaseForm;


 //use base\BaseForm;


class BlogsForm extends BaseForm{
    public $itm4pg;
    public $id0;
    public $pg;
    public $page;
    
    public $posts;                   
    
    public function getrules() {
        [];
    }            
    
public function getpostForPage($pageNum,$postPerPage, $status='published'){
    // повертає пости на сторінку  $pageNum при $postPerPage - постів на сторінку
    
    $startRow = ($pageNum-1)*$postPerPage;
  
    $addWhere=$this->getAddWhereByStatus($status);    
    
    if (!empty($addWhere)) {$addWhere=' WHERE '.$addWhere;}    
    
    $sql ="SELECT `post`.`id` as `id`,`author_id`,`headline`,`description`,`title`,`content`,`datapub`,`status`, `user`.`nickname`, `user`.`pib`  FROM post LEFT JOIN user ON post.author_id = user.id  $addWhere  LIMIT $startRow , $postPerPage";
    $mypost=$this->_db->sendSelectQuery($sql);
    
    return mysqli_fetch_all($mypost,MYSQLI_ASSOC);    
}

    public function GetPostsForPage($pg) {
         // витягуємо матеріали для сторінки N $pg                     
        
        $sql="SELECT `post`.`id` as `id`,`author_id`,`headline`,`description`,`title`,`content`,`datapub`,`status`, `user`.`nickname`, `user`.`pib`  FROM post LEFT JOIN user ON post.author_id = user.id ";
        
        $result = $this->_db->sendSelectQuery($sql);
        
        $num_rows=$result->num_rows;
        
        
        if($result->num_rows >0){
            
            $posts = $result->fetch_all(MYSQLI_ASSOC);;
            
            return $posts ;
            
        }else{
            return false;
        }
    }
                    
    public function validate() {}
    
    public function load($data) {}

}
