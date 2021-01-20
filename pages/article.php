<?php 
    require "../blocks/connect_to_db.php";
    $articlesContent = $mysql->query("SELECT * FROM `articles` WHERE `id` = ". $_GET["id"]);
    $commentsResult = $mysql->query("SELECT * FROM `comments` WHERE `articleId` = ". $_GET["id"]);

    if(isset($_COOKIE["user_id"])){
        $profile_info = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE["user_id"]);
        $user = $profile_info->fetch_assoc();
    }

    $row = $articlesContent->fetch_assoc();
    if(isset($_COOKIE["user_id"])){
        $ratesResult = $mysql->query("SELECT * FROM `rates` WHERE `articleId` = ". $_GET["id"] . " AND `userId` = ". $_COOKIE["user_id"]);

        $rates = $ratesResult->fetch_assoc();
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
                <img src="/images/blog/article_img<?php echo $row["id"]?>__title.jpg" class="title__img">
            </div>
            <div class="center__part">
                <div class="author_and_date">
                    <div class="author"><?php echo $row["author"]?></div>
                    <div class="author__job"><?php echo $row["job"]?></div>
                    <div class="publish__date">Published <?php echo $row["date"]?></div>
                    <div class="rate">
                        <?php
                            $articleId = $row["id"];
                            if(isset($_COOKIE["user_id"])){
                                $avgMysql = $mysql->query("SELECT AVG(rate) FROM rates WHERE `articleId` = ". $_GET["id"]);
                                $avg_array = $avgMysql->fetch_assoc();
                                $avg = round($avg_array["AVG(rate)"], 2);

                                $userMysql = $mysql->query("SELECT * FROM rates WHERE `articleId` = ". $_GET["id"] . " AND `userId` = ". $_COOKIE["user_id"]);
                                $userResult = $userMysql->fetch_assoc();

                                if(isset($userResult) == NULL){
                                    for($i = 1; $i <= 5; $i++){
                                        echo "<a href=\"rate.php?articleId=$articleId&id=$i\"><i class=\"far fa-star\"></i></a>";
                                    }
                                }
                                else{
                                    for($i = 1; $i <= $userResult["rate"]; $i++){
                                    echo "<a href=\"rate.php?articleId=$articleId&id=$i\"><i class=\"fas fa-star\"></i></a>";
                                    }
                                    $l = $i;
                                    for($i = $l; $i <= 5; $i++){
                                        echo "<a href=\"rate.php?articleId=$articleId&id=$i\"><i class=\"far fa-star\"></i></a>";
                                    }
                                }

                                echo "<div class=\"you_r_rate\"> Средняя оценка: " . $avg . "</div>";
                            }
                            else{
                                $avgmysql = $mysql->query("SELECT AVG(rate) FROM rates WHERE `articleId` = ". $_GET["id"]);

                                $avg_array = $avgmysql->fetch_assoc();

                                $avg = round($avg_array["AVG(rate)"]);

                                for($i = 1; $i <= $avg; $i++){
                                    echo "<i class=\"fas fa-star\"></i>";
                                }
                                $l = $i;
                                for($i = $l; $i <= 5; $i++){
                                    echo "<i class=\"far fa-star\"></i>";
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
                                <input type="submit" class="comment__button header__btn_div">
                            </div>
                        </form>
                    <?php else:?>
                        Авторизуйтесь или зарегистрируйтесь, что б писать комментарий.
                    <?php endif;?>
                </div>

                <?php
                    while($comments = $commentsResult->fetch_assoc())
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