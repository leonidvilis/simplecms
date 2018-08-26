<div >
    <form action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" method="post" class="form">
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" value="<?=$article['title']?>" name="title" class="form-control" id="title" autofocus required>
        </div>
        <div class="form-group">
            <label for="date">Дата:</label>
            <input type="date"  value="<?=$article['date']?>" name="date" class="form-control" id="date" required>
        </div>
        <div class="form-group">
            <label for="content">Содержимое:</label>
            <textarea type="text" name="content" class="form-control" id="content" required> <?=$article['content']?></textarea>
        </div>
        <input type="submit" value="Сохранить" class="btn btn-primary">
    </form>
</div>