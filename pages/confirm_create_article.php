<?php 
    require "../blocks/connect_to_db.php";

    $userResult = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE['user_id']);
    $user = $userResult->fetch_assoc();

    if($_COOKIE['user_id'] === NULL || $user["admin"] != 1){
        header('Location: /');
        exit();
    }

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

    $auto = $mysql->query("SHOW TABLE STATUS LIKE 'articles'");
    $auto = $auto->fetch_assoc();
    if($_FILES)
    {
        if ($_FILES["uploads"]["error"][0] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["uploads"]["tmp_name"][0];
            $name = $_FILES["uploads"]["name"][0];
            move_uploaded_file($tmp_name, "D:/xampp/htdocs/images/blog/article_img".($auto["Auto_increment"]-1).".jpg");
        }
        if ($_FILES["uploads"]["error"][1] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["uploads"]["tmp_name"][1];
            $name = $_FILES["uploads"]["name"][1];
            move_uploaded_file($tmp_name, "D:/xampp/htdocs/images/blog/article_img".($auto["Auto_increment"]-1)."__title.jpg");
        }
    }

    header('Location: /pages/create_article.php');
?>