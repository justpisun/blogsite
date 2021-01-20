<?php
    if(!isset($_COOKIE["user_id"])){
       header("Location: /");
       exit(); 
    }

    require "../blocks/connect_to_db.php";
    $comments = $mysql->query("SELECT * FROM `comments` WHERE `id` = ". $_GET["id"]);
    $users = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE["user_id"]);

    $comment = $comments->fetch_assoc();
    $user = $users->fetch_assoc();  

    $id_of_article = $_GET["id_of_article"];

    if($user["admin"] == 1){
        $delete_comment = $mysql->query("DELETE FROM comments WHERE id=". $_GET["id"]);
        header("Location: /pages/article.php?id=$id_of_article");
        exit(); 
    }
    else{
        if($comments["id_of_user"] == $_COOKIE["user_id"]){
            $delete_comment = $mysql->query("DELETE FROM comments WHERE id=". $_GET["id"]);
            header("Location: /pages/article.php?id=$id_of_article");
            exit(); 
        }
        else{
            header("Location: /pages/article.php?id=$id_of_article");
            exit(); 
        }
    }
?>