<?php
    if($_COOKIE['user_id'] === NULL){
        header('Location: /');
        exit();
    }
    require "../blocks/connect_to_db.php";

    if(isset($_COOKIE["user_id"])){
        $countResult = $mysql->query("SELECT COUNT(rate) FROM `rates` WHERE `articleId` = ". $_GET["articleId"] . " AND `userId` = ". $_COOKIE["user_id"]);
        $countResult = $countResult->fetch_assoc();
        $userId = $_COOKIE["user_id"];
        $articleId = $_GET["articleId"];
        if($countResult["COUNT(rate)"] == 0){
            $mysql->query("INSERT INTO rates SET userId = '$userId', articleId = '$articleId', rate =" . $_GET["id"]);
            header("Location: /pages/article.php?id=$articleId");
            exit();
        }
        else{
            $mysql->query("UPDATE rates SET rate =" . $_GET["id"]. " WHERE `articleId` = ". $_GET["articleId"] . " AND `userId` = ". $_COOKIE["user_id"]);
            header("Location: /pages/article.php?id=$articleId");
            exit();
        }
    }
    else{
        header("Location: /pages/article.php?id=$articleId");
        exit();
    }

?>