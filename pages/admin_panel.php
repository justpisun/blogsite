<?php
    require "../blocks/connect_to_db.php";

    $userResult = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE['user_id']);
    $user = $userResult->fetch_assoc();
    
    if($_COOKIE['user_id'] === NULL || $user["admin"] != 1){
        header('Location: /');
        exit();
    }

    require "../blocks/admin_check.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php"; ?>
    <title>Админ панель</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/profile.css?1">
    <link rel="stylesheet" href="/css/admin_panel.css?1">
</head>

<body>
<?php require "../blocks/header.php" ?>
    <div class="buttons">
        <a href="/pages/create_article.php" class="header__btn_div margin_right">Создать статью</a>
    </div>
    <div class="container">
        <section class="section">
            <?php
                $articlesContent = $mysql->query("SELECT * FROM `articles`");
                while($row = $articlesContent->fetch_assoc())
                {
                    require "../blocks/articles_change.php";
                }
            ?>
        <section>
    </div>
    <?php require "../blocks/footer.php" ?>
</body>

</html>

<?php $mysql->close(); ?>