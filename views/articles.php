

<?php 
    foreach($articles as $a){
?>
        <div class="article">
            <h3>
            <a href="article.php?id=<?=$a["id"]?>"><?=$a["title"]?></a>
            </h3>
            <em>Опубликованно: <?=$a["date"]?></em>
            <p><?=articles_lead($a["content"], 200)?></p>
        </div>
<?php
    }   
?>