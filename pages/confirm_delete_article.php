<?php 
    require "../blocks/connect_to_db.php";

    $userResult = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE['user_id']);
    $user = $userResult->fetch_assoc();

    if($_COOKIE['user_id'] === NULL || $user["admin"] != 1){
        header('Location: /');
        exit();
    }

    require "../blocks/admin_check.php";

    $deleteArticle = $mysql->query("DELETE FROM articles WHERE id=". $_GET["id"]);

    Header("Location: /");
?>