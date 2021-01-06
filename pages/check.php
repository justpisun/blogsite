<?php 
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    $confirm_pass = filter_var(trim($_POST['confirm_pass']),FILTER_SANITIZE_STRING);

    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);

    $confirm_email = filter_var(trim($_POST['confirm_email']),FILTER_SANITIZE_STRING);



    $first_name = filter_var(trim($_POST['first_name']),FILTER_SANITIZE_STRING);

    $second_name = filter_var(trim($_POST['second_name']),FILTER_SANITIZE_STRING);

    $birthday = filter_var(trim($_POST['birthday']),FILTER_SANITIZE_STRING);

    $country = filter_var(trim($_POST['country']),FILTER_SANITIZE_STRING);

    $city = filter_var(trim($_POST['city']),FILTER_SANITIZE_STRING);


    if(isset($_POST['accept']) && $_POST['accept'] == 'true') 
    {
        if(mb_strlen($login) <= 5 || mb_strlen($login) >= 25){
            echo "<h1>Логин слишком маленький</h1>";
            exit();
        }
        if(mb_strlen($pass) <= 8 || mb_strlen($pass) >= 30){
            echo "<h1>Пароль слишком маленький</h1>";
            exit();
        }
        if($pass != $confirm_pass){
            echo "<h1>Пароли не совпадают</h1>";
            exit();
        }
        if(mb_strlen($email) <= 7 || mb_strlen($email) >= 50){
            echo "<h1>Email не существует</h1>";
            exit();
        }
        if($email != $confirm_email){
            echo "<h1>Email не совпадают</h1>";
            exit();
        }
    }
    else
    {
        echo "<h1>Приймите соглашение!</h1>";
        exit();
    }	
    
    $pass = md5($pass."lesqdhnns");

    require "../blocks/connect_to_db.php";

    $result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `email` = '$email'");
    $user = $result->fetch_assoc();

    if($user != NULL){
        echo "Пользователь уже есть (Этот логин или пароль уже используется)";
        exit();
    }
    else{
        $dateofreg = date('Y-m-d H:i:s');
        $mysql->query("INSERT INTO `users` (`login`, `pass`, `email`,
        `first_name`, `second_name`, `birthday`, `country`, `city`, `dateofreg`)
        VALUES('$login', '$pass', '$email', '$first_name', '$second_name',
        '$birthday', '$country', '$city', '$dateofreg')");
    }

    header('Location: /');
?>