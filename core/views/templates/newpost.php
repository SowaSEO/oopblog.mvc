<?php
//
//require_once 'template/header.php';
//
//require_once 'template/navbar.php'; 

?>  
<div class="container"> 
<h1>Додаємо Нову статтю</h1>

<form name="addPost" action="addpost" method="POST">        
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Заголовок H1</span>
        </div>
        
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
        name="headline"
        value="<?= (isset($_POST['headline'])) ? $_POST['headline'] : '' ?>">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
      </div>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
             name="title"
             value="<?= (isset($_POST['title'])) ? $_POST['title'] : '' ?>">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
      </div>
      <input type="text" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
             name="description"
             value="<?= (isset($_POST['description'])) ? $_POST['description'] : '' ?>">
    </div>

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Контент</span>
      </div>
      <textarea class="form-control" aria-label="With textarea" name="content">
            <?= (isset($_POST['content'])) ? $_POST['content'] : '' ?>
      </textarea>
    </div>
    
    <br>
    <input class="btn btn-primary" type="submit" value="Зберегти">    
    <p> Автор : </p>         
</form>    
</div>
    