<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                <a class="logo__text" href="/">
                    <img class="logo__img" src="/images/logo.png" alt="Logo Image">
                </a>
            </div>
            <nav class="nav">   
            <a class="nav__link" href="/">Главная</a>
                <a class="nav__link" href="#">Cтатус</a>
                <a class="nav__link" href="#">Контакты</a>
            </nav>
            <?php if(isset($_COOKIE['user_id'])): ?>
                <div class="header__btn_all">
                    <?php
                        if(isset($_COOKIE["user_id"])){
                            if($user["admin"] == 1){
                                echo "<a href=\"/pages/admin_panel.php\" class=\"header__btn_div color background__opacity\">Админ панель</a>";
                            }
                        }
                    ?>
                    <a href="/pages/profile.php" class="header__btn_div background__opacity">Профиль</a>
                    <a href="/pages/exit.php" class="header__btn_div no__border">Выйти</a>
                </div>
            <?php else: ?>
                <div class="header__btn_all">
                    <a href="/pages/login.php" class="header__btn_div background__opacity">Логин</a>
                    <a href="/pages/reg.php" class="header__btn_div no__border">Регистрация</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>