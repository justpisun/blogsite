<?php 
    require "../blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles` WHERE `id` = ". $_GET["id"]);
    $row = $articlesContent->fetch_assoc();

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

<body class="bodyphp">
    <form class="form_change_article" action = "/pages/confirm_change_article.php?id=<?php echo $row["id"]?>" method="post">
        <article class="article">
            <img src="<?php echo $row["img_link"]?>" class="article__img" alt="Article Image">
            <div class="article__block">
                <div class="article__title">
                    <input name="title" id="title" class="input_profile" value="<?php echo $row['title']?>" placeholder="Заголовок">
                </div>
                <div class="article__maintext">
                    <textarea style="width:700px; height:130px;" name="text" id="text" class="input_profile" placeholder="Короткий текст про статью"><?php echo $row['text']?></textarea>
                </div>
            </div>
        </article>
        <div class="full_text">
            <textarea style="width:100%; height:71vh;" name="full_text" id="full_text" class="input_profile" placeholder="Полный текст про статью"><?php echo $row['full_text']?></textarea>
        </div>
        <input type="submit" class="header__btn_div margin_right" placeholder="Изменить">
    </form>
</body>

</html>

<?php $mysql->close(); ?>