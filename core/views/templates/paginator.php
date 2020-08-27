<?php

?>

<nav aria-label="...">
    
  <ul class="pagination">
    <? if ($model->_currentPage==1):  ?>  
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <?else: ?>
    <li class="page-item">
        <a class="page-link" href="page-<?= $model->_currentPage-1?>" tabindex="-1">Previous</a>
    </li>
    <?endif ?>
    
    <?for ($i=1; $i<=$model->_maxPageNum; $i=$i+1):?>
        
        <?if ($i==$model->_currentPage):?>
        
        <li class="page-item active" aria-current="page">
        
            <a class="page-link" href="#"><?=$i ?> <span class="sr-only">(current)</span></a>
        </li>
    
        <?else:?>
    
    
        <li class="page-item"><a class="page-link" href="/<?=$model->_uripage?>/page-<?=$i ?>"><?=$i ?> </a></li>
        <?endif ?>
    <?endfor ?>
    
    <? if ($model->_currentPage==$model->_maxPageNum):  ?>  
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
    </li>
    <?else: ?>
    <li class="page-item">
        <a class="page-link" href="/<?= $model->_uripage?>/page-<?= $model->_currentPage+1 ?>">Next</a>
    </li>
    <?endif ?>
    
  </ul>
</nav>
