<?php
    if($_COOKIE['user_id'] === NULL){
        header('Location: /');
        exit();
    }

    require "../blocks/connect_to_db.php";

    $result = $mysql->query("SELECT * FROM `comments`");

    $text = filter_var(trim($_POST['textarea__comment']),FILTER_SANITIZE_STRING);

    $userId = $_COOKIE['user_id'];

    $articleId = $_GET["id"];

    if(mb_strlen($text) == 0){
        echo "<h1>Введите комментарий</h1>";
        exit();
    }

    if(mb_strlen($text) >= 255){
        echo "<h1>Комментарий слишком большой</h1>";
        exit();
    }

    $mysql->query("INSERT INTO comments SET userId = '$userId', articleId = '$articleId', text = '$text'");

    header('Location: /pages/article.php?id='. $_GET["id"]);
?>