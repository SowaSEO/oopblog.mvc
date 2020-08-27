
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container">  
     <a class="navbar-brand" href="/main">OOP<b>BLOG</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav mr-auto">
        
      <li class="nav-item active">
        <a class="nav-link" href="/blogs">Блоги <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bloggers">Автори</a>
      </li>
      
      <?php if ( !empty($_SESSION['user'])): ?>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= (library\Auth::isAdmin()) ? 'Адміністрування' : 'Мої статті' ?> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/blogs/moderationpost">На модерації</a>
          <a class="dropdown-item" href="/blogs/deletedpost">Видалені</a>
          
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/blogs/allpost">Усі</a>
        </div>
      </li>
      <?php endif   ?>  
    </ul>
      
    <ul class="navbar-nav  my-lg-0">
        <?php  if (!library\Auth::isGuest() ): ?>  
                          
            <li class="nav-item">
                <a class="nav-link" href="/blog/<?= $_SESSION['user']['nickname'] ?>"><b><?= $_SESSION['user']['nickname'] ?></b></a>
            </li>
            <?php  if (library\Auth::isUser() ): ?>  
                <li class="nav-item">
                    <a class="nav-link" href="/post/addpost"><i>Нова стаття</i></a>
                </li>
            <?php endif   ?> 
            <li class="nav-item">
                <a class="nav-link" href="/logout">Вийти</a>
            </li>
        <?php else:   ?>  
        
            <li class="nav-item">
                <a class="nav-link" href="/login">Логін</a>
            </li>  
            <li class="nav-item">
                <a class="nav-link" href="/register">Реєстрація</a>
            </li>  
        <?php endif   ?>  
    </ul>  
        
  </div>
</div>
</nav>
 





