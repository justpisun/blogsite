<?php 
    require "../blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles` WHERE `id` = ". $_GET["id"]);
    $row = $articlesContent->fetch_assoc();
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php" ?>
    <title><?php echo $row["tittle"]?></title>
    <link rel="stylesheet" href="../css/article.css">
</head>

<body>
    <?php require "../blocks/header.php" ?>

    <div class="all__article">
        <div class="small__container">
            <div class="top__part">
                <div class="acrticle__tittle">
                    <?php echo $row["tittle"]?>
                </div>
                <img src="<?php echo $row["full_img_link"]?>" class="tittle__img">
            </div>
            <div class="center__part">
                <div class="author_and_date">
                    <div class="author"><?php echo $row["author"]?></div>
                    <div class="author__job"><?php echo $row["job"]?></div>
                    <div class="publish__date">Published <?php echo $row["date"]?></div>
                    <div class="rate">
                        <?php 
                            for($i = 1; $i <= $row["rate"]; $i++){
                                echo "<i class=\"fas fa-star\"></i>";
                            }
                            for($i = 1; $i <= (5-$row["rate"]); $i++){
                                echo "<i class=\"far fa-star\"></i>";
                            }
                        ?>
                    </div>
                </div>
                <div class="article__text">
                    <?php echo $row["full_text"]?>
                </div>
                <!--Article Text-->
            </div>
            <!--Center Part-->

            <div class="bottom__part">
                <div class="write__comments">
                    <div class="upper">
                        <img src="../images/user.png" class="user__img">
                        <textarea id="textarea__comment" placeholder="Оставьте комментарий"></textarea>
                    </div>
                    <div class="under">
                        <input type="submit" class="comment__button">
                    </div>
                </div>

                <div class="written__comments">
                    <img src="../images/user.png" class="user__img">
                    <div class="allwritten__comment">
                        <div class="authorof__comment">
                            Dron Gandon
                        </div>
                        <div class="comment__text">
                            Жду сталкер 2 больше, чем своего батю с магаза.
                        </div>
                    </div>
                </div>

                <div class="written__comments">
                    <img src="../images/user.png" class="user__img">
                    <div class="allwritten__comment">
                        <div class="authorof__comment">
                            Sania Garmata
                        </div>
                        <div class="comment__text">
                            Ай. Маслину поймал!
                        </div>
                    </div>
                </div>

                <div class="written__comments">
                    <img src="../images/user.png" class="user__img">
                    <div class="allwritten__comment">
                        <div class="authorof__comment">
                            Veniamin
                        </div>
                        <div class="comment__text">
                            Бля, ещё и на этот сталкер делать сборочки модов((((
                        </div>
                    </div>
                </div>
            </div>
            <!--Bottom Part-->
        </div>
        <!--Small Container-->
    </div>
    <!--All Article-->

    <?php require "../blocks/footer.php" ?>

</body>

</html>

<?php $mysql->close(); ?>