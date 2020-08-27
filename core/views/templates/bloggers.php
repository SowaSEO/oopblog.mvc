<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1><?=$this->h1?></h1>

<?php

    foreach ($model->posts as $author):
 
    ?>
    <div class="card" >
<!--  <img src="..." class="card-img-top" alt="...">-->
  <div class="card-body">
    <h5 class="card-title"><?=$author['nickname']?></h5>
    <p class="card-text"> Інформація про блогера: .</p>
  </div>
 
  <div class="card-body">
<!--    <a href="#" class="card-link">Про автора</a>-->
    <a href="<?=$model->_uripage.'/'.$author['nickname'] ?>" class="card-link">Показати матеріали</a>
  </div>
</div>
    
    <?php        
        endforeach; 
    ?>
