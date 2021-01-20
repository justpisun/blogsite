<?php 
    require "../blocks/connect_to_db.php";

    $userResult = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE['user_id']);
    $user = $userResult->fetch_assoc();

    if($_COOKIE['user_id'] === NULL || $user["admin"] != 1){
        header('Location: /');
        exit();
    }

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
    <link rel="stylesheet" href="/css/profile.css?1">
    <link rel="stylesheet" href="/css/admin_panel.css?1">
</head>

<body class="bodyphp">
    <h1>Вы действительно хотите удалить эту статью?</h1> 
    <div class="btns">
        <a href="/pages/confirm_delete_article.php?id=<?php echo $row["id"]?>" class="header__btn_div margin_right">Удалить</a>
        <a href="/pages/admin_panel.php?id=<?php echo $_GET["id"]?>" class="header__btn_div margin_right">Отмена</a>
    </div>
</body>

</html>

<?php $mysql->close(); ?>