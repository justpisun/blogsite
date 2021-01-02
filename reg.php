<!DOCTYPE HTML>
<html>

<head>
    <title>Регистрация</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css?423">
    <link rel="stylesheet" href="css/reg_page.css?423">
    
    <link rel="icon" href="./images/ico.png" type="image/png">

    <script src="https://kit.fontawesome.com/46e75e08cb.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require "./blocks/header.php" ?>

    <form class="reg__form">
        <div class="container">
            <div class="divfor__form">
                <div class="main__form shadow">
                    <div class="reg__maintittle">
                        Регистрация
                    </div>
                    <div class="all__inputs">
                        <div class="leftandright__inputs">
                            <div class="necessarily__text">
                                Обязательно
                            </div>
                            <input type="text" id="input__" placeholder="Username">
                            <input type="password" id="input__" placeholder="Password">
                            <input type="password" id="input__" placeholder="Confirm Password">
                            <input type="text" id="input__" placeholder="Email">
                            <input type="text" id="input__" placeholder="Confirm Email">

                        </div>
                        <div class="leftandright__inputs">
                            <div class="necessarily__text">
                                Не обязательно
                            </div>
                            <input type="text" id="input__" placeholder="First Name">
                            <input type="password" id="input__" placeholder="Second Name">
                            <input type="text" id="input__" placeholder="Birthday">
                            <input type="text" id="input__" placeholder="Country">
                            <input type="password" id="input__" placeholder="City">
                        </div>
                    </div>
                    <div class="accept__terms">
                        <input type="checkbox" class="terms__checkbox"> Я принимаю соглашение 
                        <a class="accept__links" href="#">Условия Использования</a> & <a class="accept__links" href="#">Политику Конфиденциальности</a>.
                    </div>
                    <div class="reg__btn">
                        <button class="reg__a">Зарегистрироваться</button>
                    </div>
                </div>
                <!--Main Form-->
            </div>
            <!--Div For Form-->
        </div>
        <!--Container-->
    </form>
    <!--Form-->

    <?php require "./blocks/footer.php" ?>
</body>

</html>