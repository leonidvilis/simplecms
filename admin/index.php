<?php    
    require_once("../database.php");
    require_once("../models/articles.php");
    
    include_once("views/header_admin.php");


    $link = db_connect();
    $articles = articles_all($link);
    
    
    // Получаем значение переменной экшен
    if(isset($_GET['action']))
        $action_get = $_GET['action'];
    else
        $action_get = "";

    //Подстановка нужных функций запроса GET
    switch ($action_get) {
        case 'add':
            if(!empty($_POST)){
                articles_new($link, $_POST['title'], $_POST['date'], $_POST['content']);
                //header('Location: admin/index.php');                
            }
            include('views/article_view_admin.php');
            break;

        case 'edit':
            if(!isset($_GET['id']))
                header("Location: index.php");
            $id = (int)$_GET['id'];
        
            if(!empty($_POST) && $id > 0){
                articles_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content']);
                //header('Location: index.php');
                echo "send";
            }

            $article = articles_get($link, $id);
            include('views/article_view_admin.php');
            break;

        case 'delete':
            $article_delete = articles_delete($link, $_GET['id']);
            if ($article_delete) 
                //header('Location: index.php');       
            break;
        default:        
            include("views/articles_admin.php");
            break;
    }
    include_once("views/footer_admin.php");
?>