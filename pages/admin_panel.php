<?php
    require "../blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles`");

    require "../blocks/admin_check.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php"; ?>
    <title>Админ панель</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/admin_panel.css">
    <link rel="stylesheet" href="/css/profile.css?1">
</head>

<body>
    <a href="/pages/profile.php" class="header__btn_div margin_right">Назад</a>
    <a href="/pages/create_article.php" class="header__btn_div margin_right">Создать статью</a>
    <div class="container">
        <section class="section">
            <?php
                while($row = $articlesContent->fetch_assoc())
                {
                    require "../blocks/articles_change.php";
                }
            ?>
        <section>
    </div>
</body>

</html>

<?php $mysql->close(); ?>