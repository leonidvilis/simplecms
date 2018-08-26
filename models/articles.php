<?php

/**
 * Возвращаем все статьи
 *
 * @param [type] $link - подключение к базе данных
 * @return $articles - ассоциативный массив 
 */
function articles_all($link){
    
    //Запрос
    $query = "SELECT * FROM articles ORDER BY id  DESC";
    $result = mysqli_query($link, $query);
    //Если не сработало вернем ошибку
    if (!$result){
        die(mysqli_error($link));
    }
    // Количество строк в выводе талицы
    $n = mysqli_num_rows($result);
    $articles = array();
    // Выводим строки в ассоциативный массив построчно
    for ($i=0; $i < $n; $i++) { 
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;
}


/**
 * Возвращает статью по id
 *
 * @param [type] $link - подключение к БД
 * @param [type] $id - идентификатор статьи в БД
 * @return void
 */
function articles_get($link, $id){
    // Запрос
    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }
    $article = mysqli_fetch_assoc($result);
    return $article;
}

/**
 * Передаем параметры для добавления новой статьи в базу данных
 *
 * @param [type] $link
 * @param [type] $title
 * @param [type] $date
 * @param [type] $content
 * @return true
 */
function articles_new($link, $title, $date, $content){
    // Подготовка
    $title = trim($title);
    $content = trim($content);

    // Проверка
    if ($title == "")
        return false;

    // Запрос
    $t = "INSERT INTO articles (title, date, content) VALUES ('%s','%s','%s')";
    $query = sprintf ($t,
                      mysqli_real_escape_string($link, $title), 
                      mysqli_real_escape_string($link, $date), 
                      mysqli_real_escape_string($link, $content));
    // echo $query;

    $result = mysqli_query($link, $query);
    if (!$result) 
        die(mysqli_error($link));

    return true;

}


/**
 * Редактируем статью в базе данных
 *
 * @param [type] $link
 * @param [type] $id
 * @param [type] $title
 * @param [type] $date
 * @param [type] $content
 * @return void
 */
function articles_edit($link, $id, $title, $date, $content) {
    // Подготовка
    $id = (int)$id;
    $title = trim($title);
    $date = trim($date);
    $content = trim($content);
    //echo "Check ok\n";
    // Проверка
    if ($title == "") 
        return false;

    //echo "title ok\n";
    // Запрос
    $t = "UPDATE articles SET title = '%s', date = '%s', content = '%s' WHERE id = '%d'";

    $query = sprintf ($t,
                      mysqli_real_escape_string($link, $title), 
                      mysqli_real_escape_string($link, $date), 
                      mysqli_real_escape_string($link, $content),
                      $id);
    //echo $query . "\n";

    $result = mysqli_query($link, $query);

    if (!$result) 
        die(mysqli_error($link));
    $ans =mysqli_affected_rows($link);
    //echo $ans . "\n";
    return $ans;
}
function articles_delete($link, $id){
    // Подготовка    
    $id = trim($id);

    // Проверка
    if ($id == "")
        return false;
    $query = "DELETE FROM articles WHERE id = $id";    

    $result = mysqli_query($link, $query);
    if (!$result) 
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function articles_lead($text, $len = 500){
    $text = mb_substr($text, 0 , $len);
    echo $text;
    return $text;
}

?>