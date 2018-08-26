<?php

  include_once("views/header.php");

  require_once("database.php");
  require_once("models/articles.php");
  $link = db_connect();
  $articles = articles_all($link);

  ?>

  <a href="admin">Панель управления</a>
  
<?php

  include("views/articles.php");
  include_once("views/footer.php");  
?>