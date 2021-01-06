<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once (__ROOT__."/blocks/connect_to_db.php");
    $profile_info = $mysql->query("SELECT * FROM `users`");
    $user = $profile_info->fetch_assoc();
?>

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
            
            <?php if(isset($_COOKIE['usertime'])): ?>
                <div class="header__btn_all">
                    <a href="/pages/profile.php?id=<?php echo $user["id"]?>" class="header__btn_div background__opacity">Профиль</a>
                    <a href="/pages/exit.php" class="header__btn_div no__border">Выйти</a>
                </div>
            <?php else: ?>
                <div class="header__btn_all">
                    <a href="/pages/login.php" class="header__btn_div shadow">Логин</a>
                    <a href="/pages/reg.php" class="header__btn_div shadow">Регистрация</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>