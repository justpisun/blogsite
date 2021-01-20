<?php
    require "../blocks/connect_to_db.php";

    $result = $mysql->query("SELECT * FROM `comments`");
    
    if($_COOKIE['user_id'] === NULL){
        header('Location: /');
        exit();
    }

    $text = filter_var(trim($_POST['textarea__comment']),FILTER_SANITIZE_STRING);

    $id_of_user = $_COOKIE['user_id'];

    $id_of_article = $_GET["id"];


    if(mb_strlen($text) == 0 || mb_strlen($text) >= 255){
        echo "<h1>Введите комментарий корректно</h1>";
        exit();
    }

    $mysql->query("INSERT INTO comments SET id_of_user = '$id_of_user', id_of_article = '$id_of_article', text = '$text'");

    header('Location: /pages/article.php?id='. $_GET["id"]);
?>