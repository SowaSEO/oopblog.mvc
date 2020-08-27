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

class BlogForm extends BaseForm{    
    
    public $posts;
                       
    public function getrules() {
        [];
    }
                
    public function getpostBloggerForPage( $pageNum, $postPerPage, $idBlogger, $status='published'){
        
    // повертає пости на сторінку  $pageNum при $postPerPage - постів на сторінку
    
    $startRow = ($pageNum-1)*$postPerPage;
    
    $addWhere=$this->getAddWhereByStatus($status);    
        
    $sql ="SELECT `post`.`id` as `id`,`author_id`,`headline`,`description`,`title`,`content`,`datapub`,`status`, `user`.`nickname`, `user`.`pib`  FROM post LEFT JOIN user ON post.author_id = user.id WHERE user.id = $idBlogger $addWhere  LIMIT $startRow , $postPerPage";  
    
    
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
                    
    public function validate() {                
    }
    
    public function load($data) {              
    }
    
        
    public function getIdBloggerByName($bloggerName) { 
                    
    //  Повертає код блогера за ніккнеймом
    
    $blName = $this->_db->getSafeData(htmlspecialchars(trim($bloggerName)));
    
    $sql="SELECT `id` FROM `user` WHERE LOWER(`nickname`)='$blName'";
   
    $countP = $this->_db->sendSelectQuery($sql)->fetch_row();

    return  $countP['0'];    
}


  public function getMaxPageNumberForBloggerId($table, $postPerPage, $idBlogger, $status='published') {
    
         $addWhere=$this->getAddWhereByStatus($status); 
                  
        if (!empty($addWhere)) {            
            $addWhere=' AND '.$addWhere;            
        } 

        $sql=" SELECT COUNT(*) FROM $table where author_id=$idBlogger $addWhere";     
        
        $countP = $this->_db->sendSelectQuery($sql)->fetch_row();

       return ceil($countP['0']/$postPerPage);
    
    }

    function getPostByBloggerId($pageNum,$postPerPage,$idBlogger, $status='all') {

        $startRow = ($pageNum-1)*$postPerPage;

        $addWhere=$this->getAddWhereByStatus($status);     

        if (!empty($addWhere)) {$addWhere=' and '.$addWhere;}  

        $sql ="SELECT `post`.`id` as `id`,`author_id`,`headline`,`description`,`title`,`content`,`datapub`,`status`, `user`.`nickname`, `user`.`pib`  FROM post LEFT JOIN user ON post.author_id = user.id  WHERE  user.id=$idBlogger $addWhere LIMIT $startRow , $postPerPage";

        $mypost=$this->_db->sendSelectQuery($sql);

        return mysqli_fetch_all($mypost,MYSQLI_ASSOC);        
    }


    public function getPostByBlogger($pageNum,$postPerPage,$bloggerName, $status='all') {

        $blName = getSaveData(htmlspecialchars(trim($bloggerName)));

        $startRow = ($pageNum-1)*$postPerPage;

        $addWhere=$this->getAddWhereByStatus($status);     

        if (!empty($addWhere)) {$addWhere=' and '.$addWhere;}  

        $sql ="SELECT `post`.`id` as `id`,`author_id`,`headline`,`description`,`title`,`content`,`datapub`,`status`, `user`.`nickname`, `user`.`pib`  FROM post LEFT JOIN user ON post.author_id = user.id  WHERE  LOWER(`nickname`)='$blName' $addWhere LIMIT $startRow , $postPerPage";

        $mypost=$this->_db->sendSelectQuery($sql);

        return mysqli_fetch_all($mypost,MYSQLI_ASSOC);        
    }

}