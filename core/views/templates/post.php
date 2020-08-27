<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$post=$model->post
?>

<div class="container">
    <div class="hero-unit ">
                
        <h1><?= $post['headline'] ?></h1>    

        <p> Автор: <b><?= $post['nickname'] ?></b></p>
        
        <span> <?= TEXTSTATUS[$post['status']].'  '.$post['datapub']  ?></span>
        
    <form method="post">
        
        <?  if ( $this->iSAdmin()):  ?>
        
            <? if($post['status'] < POST_STATUS_PUBLISHED ):  ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="publikuvaty" name="moderation">
                    <label class="form-check-label" for="inlineCheckbox1">Опублікувати</label>
                </div>
            <? endif ?>
            
            <? if($post['status']>= POST_STATUS_MODERATION):  ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="deleted" name="moderation">
                <label class="form-check-label" for="inlineCheckbox2">Видалити</label>
            </div>
                        
            <? endif ?>
            <button class="btn btn-primary" type="submit">Змінити статус</button>
            

        <? endif ?><hr>
        
        <div class="card-text">
      <?= $post['content']; ?>      
        </div>
        <hr>              
         <a href="/blog/<?= $post['nickname'] ?>" class="alert-link">Інші матеріали автора</a>
    </form>                      
    </div>

</div>