<?php
    require "./blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles`");
    if(isset($_COOKIE["user_id"])){
        $profile_info = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE["user_id"]);
        $user = $profile_info->fetch_assoc();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "./blocks/head.php"; ?>
    <title>Главная</title>
    <link rel="stylesheet" href="/css/index.css">    
</head>

<body>
    <?php require "./blocks/header.php" ?>
    <div class="container">
        <section class="section">
            <?php
                while($row = $articlesContent->fetch_assoc())
                {   
                    require "./blocks/articles.php";
                }
            ?>
        <section>
    </div>
    <?php require "./blocks/footer.php" ?>
</body>

</html>

<?php $mysql->close(); ?>