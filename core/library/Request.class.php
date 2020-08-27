<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace library;

/**
 * Description of Request
 *
 * @author User
 */
class Request {
    //put your code here
    
    public static function isPost() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
            return false;
        }
        return true;        
    }
    
    public static function getPost() {
         
        return $_POST;
        
    }  
    
}
