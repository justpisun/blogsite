<?php
    require "../blocks/connect_to_db.php";
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `id`= '$id'");
    $user = $result->fetch_assoc();
    setcookie('user_id', $user['id'], time() - 3600 * 24, "/");

    header('Location: /');
?>