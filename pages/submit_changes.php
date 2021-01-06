<?php
    require "../blocks/connect_to_db.php";

    $result = $mysql->query("SELECT * FROM `users` WHERE `id`= " . $_COOKIE["user_id"]);
    $user = $result->fetch_assoc();
    
    if($_COOKIE['user_id'] === NULL){
        header('Location: /');
        exit();
    }

    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    $description = filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);

    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);

    $first_name = filter_var(trim($_POST['first_name']),FILTER_SANITIZE_STRING);

    $second_name = filter_var(trim($_POST['second_name']),FILTER_SANITIZE_STRING);

    $birthday = filter_var(trim($_POST['birthday']),FILTER_SANITIZE_STRING);

    $country = filter_var(trim($_POST['country']),FILTER_SANITIZE_STRING);

    $city = filter_var(trim($_POST['city']),FILTER_SANITIZE_STRING);


    if(mb_strlen($login) <= 5 || mb_strlen($login) >= 25){
        echo "<h1>Логин слишком маленький</h1>";
        exit();
    }
    if(mb_strlen($description) <= 8 || mb_strlen($description) >= 30){
        echo "<h1>Описание слишком маленькое</h1>";
        exit();
    }
    if(mb_strlen($email) <= 7 || mb_strlen($email) >= 50){
        echo "<h1>Email не существует</h1>";
        exit();
    }
    if(mb_strlen($first_name) <= 2 || mb_strlen($first_name) >= 30){
        echo "<h1>Имя не существует</h1>";
        exit();
    }
    if(mb_strlen($second_name) <= 2 || mb_strlen($second_name) >= 30){
        echo "<h1>Фамилия не совпадают</h1>";
        exit();
    }
    if(mb_strlen($birthday) != 10){
        echo "<h1>Введите дату правильно</h1>";
        exit();
    }
    if(mb_strlen($country) <= 4 || mb_strlen($country) >= 20){
        echo "<h1>Введите страну правильно</h1>";
        exit();
    }
    if(mb_strlen($city) <= 2 || mb_strlen($city) >= 40){
        echo "<h1>Введите город правильно</h1>";
        exit();
    }

    $mysql->query("UPDATE users SET login = '$login', description = '$description', email = '$email', first_name = '$first_name', second_name = '$second_name', birthday = '$birthday', country = '$country', city = '$city' WHERE id = " . $_COOKIE["user_id"] );

    header('Location: /pages/profile.php');
?>