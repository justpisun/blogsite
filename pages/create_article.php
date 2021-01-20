<?php 
    require "../blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles`");
    $row = $articlesContent->fetch_assoc();

    require "../blocks/admin_check.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php"; ?>
    <title>Создать статью</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/profile.css?1">
    <link rel="stylesheet" href="/css/admin_panel.css?1">
</head>

<body class="bodyphp">
    <form class="form_create_article" action = "/pages/confirm_create_article.php" method="post">
        <article class="article">
            <img src="" class="article__img" alt="Article Image">
            <div class="article__block">
                <div class="article__title">
                    <input name="title" id="title" class="input_profile" placeholder="Заголовок">
                </div>
                <div class="article__maintext">
                    <textarea name="create_text" id="create_text" class="input_profile" placeholder="Короткий текст про статью"></textarea>
                </div>
            </div>
        </article>
        <div class="full_text">
            <textarea name="create_full_text" id="create_full_text" class="input_profile" placeholder="Полный текст про статью"></textarea>
        </div>
        <div class="change_article_buttons">
            <input type="submit" class="header__btn_div margin_right margin_bottom">
            <a href="/pages/admin_panel.php" class="header__btn_div margin_right">Назад</a>
        </div>
    </form>
</body>

</html>

<?php $mysql->close(); ?>