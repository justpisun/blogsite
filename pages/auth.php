<?php 
    $login = filter_var(trim($_POST['login']));

    $pass = filter_var(trim($_POST['pass']));

    $pass = md5($pass."lesqdhnns");

    require "../blocks/connect_to_db.php";
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();

    if($user == NULL){
        echo "Неверный логин или пароль";
        exit();
    }
    else{
        setcookie('user_id', $user['id'] , time() + 3600 * 24, "/");
    }

    header('Location: /');
?>