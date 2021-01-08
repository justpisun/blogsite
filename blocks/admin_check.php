<?php 
    $useradmin = $mysql->query("SELECT * FROM `users` WHERE id=" . $_COOKIE["user_id"]);
    $admin = $useradmin->fetch_assoc();
    if($admin['admin'] == 0){
        header("Location: /");
        exit();
    }
?>