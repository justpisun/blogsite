<?php
    require "../blocks/connect_to_db.php";

    $result = $mysql->query("SELECT * FROM `articles` WHERE `id`= " . $_GET["id"]);
    $articles = $result->fetch_assoc();
    
    require "../blocks/admin_check.php";
    
    $title = $_POST['title'];

    $text = $_POST['text'];

    $full_text = $_POST['full_text'];


    $mysql->query("UPDATE articles SET title = '$title', text = '$text', full_text = '$full_text' WHERE id = " . $_GET["id"] );

    header('Location: /pages/admin_panel.php');
?>