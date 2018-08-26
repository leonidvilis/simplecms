<?php
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "user");
define("MYSQL_PASSWORD", "1234");
define("MYSQL_DB", "simplecms");

function db_connect(){
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die("Error: " . mysqli_error($link));

    if(!mysqli_set_charset($link, "utf8")){
        printf("Error: " . mysqli_error($link));
    }
    return $link;
}