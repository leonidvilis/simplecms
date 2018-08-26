<?php ?>
<table border="1">
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($articles as $a) { ?>        
        <tr>
            <td><?=$a['date']?></td>
             <td><?=$a['title']?></td>
            <td><a href="index.php?action=edit&id=<?= $a['id']?>">Редактировать</a></td>
            <td><a href="index.php?action=delete&id=<?= $a['id']?>">Удалить</a></td>
        </tr>
    <?php } ?>
</table>
<a href="index.php?action=add">Добавить статью.</a>