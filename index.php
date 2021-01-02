<!DOCTYPE HTML>
<html>

<head>
    <title>Главная</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css?423">
    <link rel="stylesheet" href="css/index.css?423">
    
    <link rel="icon" href="./images/ico.png" type="image/png">

    <script src="https://kit.fontawesome.com/46e75e08cb.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require "./blocks/header.php" ?>
    <div class="container">
        <section class="section">
            <?php for($i = 0; $i < 5; $i++)
                require "./blocks/articles.php"
            ?>
        <section>
    </div>
    <?php require "./blocks/footer.php" ?>
</body>

</html>