<?php
    require "../blocks/connect_to_db.php";
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login'");
    $user = $result->fetch_assoc();
    setcookie('usertime', $user['login'], time() - 3600 * 24, "/");

    header('Location: /');
?>