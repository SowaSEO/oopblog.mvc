<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$errors = $data['model']->getErrors();


if(!empty($errors)){
    
//    var_dump($errors);
}

?>

<h1> Ввійти </h1>




<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" 
           class="form-control <?= (isset($formErrors['login'])) ? 'error' : 'noerror' ?>"
           value="<?= (isset($_POST['login'])) ? $_POST['login'] : '' ?>"
           aria-describedby="emailHelp" name="email">
    
    <small id="emailHelp" 
           class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
    
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>    
    <input type="password" name="password"
           class="form-control <?= (isset($formErrors['password'])) ? 'error' : 'noerror' ?>"
           value="<?= (isset($_POST['password'])) ? $_POST['password'] : '' ?>">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- <hr>
    <p> Ще немає облікового зарису?   <a class="nav-link" href="/registration">Створити Акаунт</a></p>  
         -->


<!--<h2>ЛОГІН</h2>-->
<!--
<form method="POST">
    <input type="email" name="email" value="" />
    <input type="text" name="password" value="" />
    <input type="submit" value="Авторизація" />
    
</form>-->


<hr>
<p> Ще немає облікового зарису?   <a class="nav-link" href="/register">Створити Акаунт</a></p>