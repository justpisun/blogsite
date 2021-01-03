<!DOCTYPE HTML>
<html>

<head>
    <?php require "./blocks/head.php"; ?>
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/reg_page.css">
</head>

<body>
    <?php require "./blocks/header.php" ?>

    <form class="reg__form" action="" method="post">
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
                            <input class="input__" placeholder="Username">
                            <input type="password" class="input__" placeholder="Password">
                            <input type="password" class="input__" placeholder="Confirm Password">
                            <input class="input__" placeholder="Email">
                            <input class="input__" placeholder="Confirm Email">
                        </div>
                        <div class="leftandright__inputs">
                            <div class="necessarily__text">
                                Не обязательно
                            </div>
                            <input class="input__" placeholder="First Name">
                            <input class="input__" placeholder="Second Name">
                            <input class="input__" placeholder="Birthday">
                            <input class="input__" placeholder="Country">
                            <input class="input__" placeholder="City">
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