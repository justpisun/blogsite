<?php
    if(!isset($_COOKIE["user_id"])){
        header("Location: /");
        exit(); 
    }

    require "../blocks/connect_to_db.php";
    $commentsResult = $mysql->query("SELECT * FROM `comments` WHERE `id` = ". $_GET["id"]);
    $usersResult = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE["user_id"]);

    $comment = $commentsResult->fetch_assoc();
    $user = $usersResult->fetch_assoc();  

    $articleId = $_GET["articleId"];

    if($user["admin"] == 1){
        $mysql->query("DELETE FROM comments WHERE id=". $_GET["id"]);
        header("Location: /pages/article.php?id=$articleId");
        exit(); 
    }
    
    if($comment["userId"] == $_COOKIE["user_id"]){
        $mysql->query("DELETE FROM comments WHERE id=". $_GET["id"]);
        header("Location: /pages/article.php?id=$articleId");
        exit(); 
    }

    header("Location: /pages/article.php?id=$articleId");
    exit(); 
?>