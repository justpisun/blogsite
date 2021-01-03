<?php
    $mysql = new mysqli('localhost','root','','stalker');

    $articlesContent = $mysql->query("SELECT * FROM `articles`");
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "./blocks/head.php"; ?>
    <title>Главная</title>
    <link rel="stylesheet" href="css/index.css">    
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