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
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <?php require "../blocks/header.php" ?>
    
        <div class="container">
            <div class="center">
                <div class="profile">
                    <div class="left__profile">
                        <div class="tittle__profile">
                            Пользователь сайта
                        </div>
                        <img src="../images/user.png" class="user__img" alt="user-img">
                        <div class="full__name"><?php echo $user["first_name"]." ".$user["second_name"]?></div>
                        <div class="description">
                            <?php 
                                if($user["description"]==""){
                                    echo "Описания нет";
                                }
                                else{
                                    echo $user["description"];
                                }
                            ?>
                        </div>
                        <div class="change">
                            <a href="/pages/change_profile.php?id=<?php echo $user["id"]?>" class="header__btn_div color">Изменить</a>
                        </div>
                    </div>
                    <div class="right__profile">
                        <table class="right__table">
                            <tr>
                                <td class="tittle">Логин</td>
                                <td><?php echo $user["login"]?></td>
                            </tr>
                            <tr>
                                <td class="tittle">Почта</td>
                                <td><?php echo $user["email"]?></td>
                            </tr>
                            <tr>
                                <td class="tittle">Имя и фамилия</td>
                                <td><?php echo $user["first_name"]." ".$user["second_name"]?></td>
                            </tr>
                            <tr>
                                <td class="tittle">День рождения</td>
                                <td><?php echo $user["birthday"]?></td>
                            </tr>
                            <tr>
                                <td class="tittle">Страна</td>
                                <td><?php echo $user["country"]?></td>
                            </tr>
                            <tr class="bottom__border">
                                <td class="tittle">Город</td>
                                <td><?php echo $user["city"]?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--Profile-->
            </div>
            <!--Center-->
        </div>
        <!--Container-->

    <?php require "../blocks/footer.php" ?>
</body>

</html>

<?php $mysql->close(); ?>