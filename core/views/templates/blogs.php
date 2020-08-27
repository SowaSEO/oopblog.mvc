<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1><?=$this->h1?></h1>

<?php
    foreach ($model->listposts as $post): 
?>    
    
  <div class="card">
    <div class="card-header"> Автор:<b> <?=$post['nickname']?></b></div>

    <div class="card-body">
                  
        <b> <?=  TEXTSTATUS[$post['status']].'</b> <cite title="Source Title">  '.$post['datapub'] ?></cite>                       
        <h5 class="card-title"><?=$post['headline']?></h5>
        <p class="card-text"><?=$post['description']?></p>
        <hr>
        <a href="/post/<?= $post['id'] ?>" class="btn btn-primary">Читати повністю</a>
        <a href="/blog/<?= $post['nickname'] ?>" class="btn btn-primary">Інші матеріали автора</a>

    </div>
</div>           
    <?php
      endforeach;
      include $this->basePath.'paginator.php';      
    ?>  