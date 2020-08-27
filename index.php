<?php

session_start();


require_once 'core/config/base_conf.php';


//echo '$_SESSION=';var_dump($_SESSION);echo '<hr>';
//echo '$_POST=';var_dump($_POST);echo '<hr>';

ini_set('error_reporting', E_ALL);ini_set('display_errors', 1); ini_set('display_startup_errors', 1);

use library\Url;

function __autoload($className){

// echo '<hr> AUtOLOAD :'.$className.' '; var_dump($className);   
       
    $fileName = 'core/'.str_replace('\\', '/', $className).'.class.php';

//  echo '<hr> fileName:'.$fileName.' '; var_dump($fileName);   
    
    if (!file_exists($fileName)) {
        
        throw new Exception ('class'.$className.' Not found '.$fileName);        
    }
    
    require_once $fileName;
    
}

$controllerName = Url::getSegment(0);

$actionName= Url::getSegment(1);



if (is_null($controllerName)) {
    
    $controller = 'controllers\ControllerMain';
    
} else {
    
    $controller = 'controllers\Controller'.ucfirst($controllerName);
//    echo '<hr> $controller:'.$controller.' '; var_dump($controller);   
}


$listActionName=array('moderationpost','deletedpost','allpost','addpost','editpost');

if (in_array($actionName, $listActionName)){
    
    $action = 'action'.ucfirst($actionName);
    
} else {
    
    $action = 'actionIndex';    
}


try{
    
    $fileName = 'core/'.str_replace('\\', '/', $controller).'.class.php';

    if(!file_exists($fileName)) 
    {
        throw new library\HttpException($fileName.' Page not found','404');
    }

    $controller = new $controller;
    
    if(!method_exists($controller, $action)) {
        
        throw new library\HttpException($action.' Method Not found ','404');
        
    }    
    $controller->$action();
    
} 

catch (\library\HttpException $e){
             
    header("HTTP/1.1 ".$e->getCode()." ".$e->getMessage());
    
    die($e->getMessage().' Page not found');
    
} 
catch (Exception $e) {
        
    die($e->getMessage());
    
}