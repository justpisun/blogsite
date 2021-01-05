<?php
    require "../blocks/connect_to_db.php";
    $profile_info = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_GET["id"]);
    $user = $profile_info->fetch_assoc();
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php"; ?>
    <title>Профиль</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>

<body>
    <?php require "../blocks/header.php" ?>
        <div class="container">
            <form action="submit_changes.php?id=<?php echo $user["id"]?>" method="post">
                <div class="center">
                    <div class="profile">
                        <div class="left__profile">
                            <div class="tittle__profile">
                                Пользователь сайта
                            </div>
                            <img src="../images/user.png" class="user__img" alt="user-img">
                            <div class="full__name"><?php echo $user["first_name"] . " " . $user["second_name"]?></div>
                            <div class="description">
                                <input name="description" id="description" class="input_profile description" value="<?php echo $user['description']?>" placeholder="Описание">
                            </div>
                            <div class="change">
                                <input type="submit" value="Подтвердить изменение" class="header__btn_div color">
                            </div>
                            <div class="change">
                                <a href="/pages/profile.php?id=<?php echo $user["id"]?>" class="header__btn_div color">Отмена</a>
                            </div>
                        </div>
                        <div class="right__profile">
                            <table class="right__table">
                                <tr>
                                    <td class="tittle">Логин</td>
                                    <td><input name="login" id="login" class = "input_profile" value="<?php echo $user['login']?>" placeholder="Логин"></td>
                                </tr>
                                <tr>
                                    <td class="tittle">Почта</td>
                                    <td><input name="email" id="email" class = "input_profile" value="<?php echo $user['email']?>" placeholder="Почта"></td>
                                </tr>
                                <tr>
                                    <td class="tittle">Имя и фамилия</td>
                                    <td>
                                        <input name="first_name" id="login" value="<?php echo $user['first_name']?>" class = "input_profile margin top" placeholder="Имя">
                                        <input name="second_name" id="login" value="<?php echo $user['second_name']?>" class = "input_profile margin" placeholder="Фамилия">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tittle">День рождения</td>
                                    <td><input name="birthday" id="birthday" value="<?php echo $user['birthday']?>" class = "input_profile" placeholder="День Рождения"></td>
                                </tr>
                                <tr>
                                    <td class="tittle">Страна</td>
                                    <td><input name="country" id="country" value="<?php echo $user['country']?>" class = "input_profile" placeholder="Страна"></td>
                                </tr>
                                <tr class="bottom__border">
                                    <td class="tittle">Город</td>
                                    <td><input name="city" id="city" value="<?php echo $user['city']?>" class = "input_profile" placeholder="Город"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!--Profile-->
                </div>
                <!--Center-->
            </form>
            <!--Form-->
        </div>
        <!--Container-->

    <?php require "../blocks/footer.php" ?>
</body>

</html>

<?php $mysql->close(); ?>