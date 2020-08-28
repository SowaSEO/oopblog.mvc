<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$errors = $model->getErrors();

$errors = $data['model']->getErrors();

if(!empty($errors)){
    
    var_dump($errors);
}

?>


<h1> РЕЄСТРАТУРА </h1>

<form method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">Нікнейм</label>
    <input type="text" name="nickname"
           value="<?= (isset($_POST['nickname'])) ? $_POST['nickname'] : '' ?>"           
           class="form-control <?= (isset($formErrors['login'])) ? 'error' : 'noerror' ?>"
           aria-describedby="emailHelp">
    <small class="form-text text-muted"> Латинські літери і цифри </small>
  </div>
    
  <div class="form-group">      
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email"
           class="form-control <?= (isset($formErrors['email'])) ? 'error' : 'noerror' ?>"
           
           placeholder="miy@email.com" aria-describedby="emailHelp"
           
           value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
    
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name ='password'
           class="form-control <?= (isset($formErrors['password'])) ? 'error' : 'noerror' ?>"           
           value="<?= (isset($_POST['password'])) ? $_POST['password'] : '' ?>">
    
    
    
  </div>
    
<div class="form-group">
    <label for="exampleInputPassword1">Повторити Password</label>
    <input type="password" name ='password_confirm'
           class="form-control <?= (isset($formErrors['password'])) ? 'error' : 'noerror' ?>"           
           value="<?= (isset($_POST['password'])) ? $_POST['password'] : '' ?>">        
    
  </div>    
    
    
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Зареєструвати</button>
</form>

<hr>
   
<hr>
    <p> У Вас вже є обліковий запис?   <a class="nav-link" href="/login">Ввійти</a></p>  
         