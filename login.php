<!DOCTYPE HTML>
<html>

<head>
    <title>Авторизация</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css?423">
    <link rel="stylesheet" href="css/login_page.css?423">
    
    <link rel="icon" href="./images/ico.png" type="image/png">

    <script src="https://kit.fontawesome.com/46e75e08cb.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require "./blocks/header.php" ?>

    <form class="login__form">
        <div class="container">
            <div class="divfor__form">
                <div class="main__form shadow">
                    <div class="login__maintittle">
                        Вход в аккаунт
                    </div>
                    <input type="text" id="input__" placeholder="Username">
                    <input type="password" id="input__" placeholder="Password">
                    <div class="login__btn">
                        <button class="login__a">Войти</button>
                    </div>
                    <div class="create__acc">
                        Смешарик? Тогда <a class="create__acc_a" href="reg.php">Создай аккаунт</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php require "./blocks/footer.php" ?>
</body>

</html>