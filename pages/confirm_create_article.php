<?php 
    require "../blocks/connect_to_db.php";  
    $title = filter_var(trim($_POST['title']),FILTER_SANITIZE_STRING);

    $create_text = filter_var(trim($_POST['create_text']),FILTER_SANITIZE_STRING);

    $create_full_text = filter_var(trim($_POST['create_full_text']),FILTER_SANITIZE_STRING);


    $users = $mysql->query("SELECT * FROM `users` WHERE id=". $_COOKIE["user_id"]);
    $user = $users->fetch_assoc();

    $author = $user["first_name"]." ".$user["second_name"];

    $job = "ADMIN";

    $date = date('Y-m-d');

    require "../blocks/connect_to_db.php";
    
    $mysql->query("INSERT INTO `articles` (`title`, `text`, `full_text`, `author`, `job`, `date`)
    VALUES('$title', '$create_text', '$create_full_text', '$author', '$job', '$date')");

    header('Location: /pages/create_article.php');
?>