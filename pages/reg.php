<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php"; ?>
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/reg_page.css?1">
</head>

<body>
    <?php require "../blocks/header.php" ?>

    <form class="reg__form" action="check.php" method="post">
        <div class="container">
            <div class="divfor__form">
                <div class="main__form shadow">
                    <div class="reg__maintitle">
                        Регистрация
                    </div>
                    <div class="all__inputs">
                        <div class="leftandright__inputs">
                            <div class="necessarily__text">
                                Обязательно
                            </div>
                            <input class="input__" name="login" id="login" placeholder="Username">
                            <input type="password" name="pass" id="pass" class="input__" placeholder="Password">
                            <input type="password" name="confirm_pass" id="confirm_pass" class="input__" placeholder="Confirm Password">
                            <input class="input__" name="email" id="email" placeholder="Email">
                            <input class="input__" name="confirm_email" id="confirm_email" placeholder="Confirm Email">
                        </div>
                        <div class="leftandright__inputs">
                            <div class="necessarily__text">
                                Не обязательно
                            </div>
                            <input class="input__" name="first_name" id="first_name" placeholder="First Name">
                            <input class="input__" name="second_name" id="second_name" placeholder="Second Name">
                            <input class="input__" name="birthday" id="birthday" placeholder="Birthday">
                            <input class="input__" name="country" id="country" placeholder="Country">
                            <input class="input__" name="city" id="city" placeholder="City">
                        </div>
                    </div>
                    <div class="accept__terms">
                        <input type="checkbox" name="accept" id="accept" value="true" class="terms__checkbox"> Я принимаю соглашение 
                        <a class="accept__links" href="#">Условия Использования</a> & <a class="accept__links" href="#">Политику Конфиденциальности</a>.
                    </div>
                    <div class="reg__btn">
                        <button class="reg__a" type="submit">Зарегистрироваться</button>
                    </div>
                </div>
                <!--Main Form-->
            </div>
            <!--Div For Form-->
        </div>
        <!--Container-->
    </form>
    <!--Form-->

    <?php require "../blocks/footer.php" ?>
</body>

</html>