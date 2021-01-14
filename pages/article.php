<?php 
    require "../blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles` WHERE `id` = ". $_GET["id"]);
    $comments = $mysql->query("SELECT * FROM `comments` WHERE `id_of_article` = ". $_GET["id"]);

    $row = $articlesContent->fetch_assoc();
    if(isset($_COOKIE["user_id"])){
        $rate = $mysql->query("SELECT * FROM `rates` WHERE `id_of_article` = ". $_GET["id"] . " AND `id_of_user` = ". $_COOKIE["user_id"]);

        $rate_array = $rate->fetch_assoc();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require "../blocks/head.php"?>
    <title><?php echo $row["title"]?></title>
    <link rel="stylesheet" href="/css/article.css?2">
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <?php require "../blocks/header.php" ?>

    <div class="all__article">
        <div class="small__container">
            <div class="top__part">
                <div class="article__title">
                    <?php echo $row["title"]?>
                </div>
                <img src="<?php echo $row["full_img_link"]?>" class="title__img">
            </div>
            <div class="center__part">
                <div class="author_and_date">
                    <div class="author"><?php echo $row["author"]?></div>
                    <div class="author__job"><?php echo $row["job"]?></div>
                    <div class="publish__date">Published <?php echo $row["date"]?></div>
                    <div class="rate">
                        <?php
                            if(isset($_COOKIE["user_id"])){
                                $count = $mysql->query("SELECT COUNT(rate) FROM rates WHERE `id_of_article` = ". $_GET["id"]);
                                $count = $count->fetch_assoc();
                                $id_of_article = $row["id"];
                                if($count["COUNT(rate)"] == 0){
                                    for($i = 1; $i <= 5; $i++){
                                        echo "<a href=\"rate.php?id_of_article=$id_of_article&id=$i\"><i class=\"far fa-star\"></i></a>";
                                    }
                                }
                                else{
                                    $avgmysql = $mysql->query("SELECT AVG(rate) FROM rates WHERE `id_of_article` = ". $_GET["id"]);

                                    $avg_array = $avgmysql->fetch_assoc();

                                    $avg = round($avg_array["AVG(rate)"]);

                                    for($i = 1; $i <= $avg; $i++){
                                        echo "<a href=\"rate.php?id_of_article=$id_of_article&id=$i\"><i class=\"fas fa-star\"></i></a>";
                                    }
                                    $l = $i;
                                    for($i = $l; $i <= 5; $i++){
                                        echo "<a href=\"rate.php?id_of_article=$id_of_article&id=$i\"><i class=\"far fa-star\"></i></a>";
                                    }
                                }
                                if(isset($rate_array)){
                                    echo "<div class=\"you_r_rate\"> Вы уже проголосовали, ваша оценка: " . $rate_array["rate"]. "</div>";
                                }
                            }
                            else{
                                $count = $mysql->query("SELECT COUNT(rate) FROM rates WHERE `id_of_article` = ". $_GET["id"]);
                                $count = $count->fetch_assoc();
                                $id_of_article = $row["id"];
                                if($count["COUNT(rate)"] == 0){
                                    for($i = 1; $i <= 5; $i++){
                                        echo "<i class=\"far fa-star\"></i>";
                                    }
                                }
                                else{
                                    $avgmysql = $mysql->query("SELECT AVG(rate) FROM rates WHERE `id_of_article` = ". $_GET["id"]);

                                    $avg_array = $avgmysql->fetch_assoc();

                                    $avg = round($avg_array["AVG(rate)"]);

                                    for($i = 1; $i <= $avg; $i++){
                                        echo "<i class=\"fas fa-star\"></i>";
                                    }
                                    $l = $i;
                                    for($i = $l; $i <= 5; $i++){
                                        echo "<i class=\"far fa-star\"></i>";
                                    }
                                }
                                echo "<div class=\"you_r_rate\">Зарегистрируйтесь, что б ставить оценки</div>";
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
                    <?php if(isset($_COOKIE["user_id"])):?>
                        <form action="write_comment.php?id=<?php echo $_GET["id"]?>" method="post">
                            <div class="upper">
                                <img src="/images/user.png" class="user__img">
                                <textarea name="textarea__comment" id="textarea__comment" placeholder="Оставьте комментарий"></textarea>
                            </div>
                            <div class="under">
                                <input type="submit" class="comment__button">
                            </div>
                        </form>
                    <?php else:?>
                        Авторизуйтесь или зарегистрируйтесь, что б писать комментарий.
                    <?php endif;?>
                </div>

                <?php
                    while($array_of_comments = $comments->fetch_assoc())
                    {
                        require "../blocks/comment.php";
                    }
                ?>
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