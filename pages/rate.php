<?php 
    require "../blocks/connect_to_db.php";
    $rate = $mysql->query("SELECT * FROM `rates` WHERE `id_of_article` = ". $_GET["id_of_article"] . " AND `id_of_user` = ". $_COOKIE["user_id"]);

    $row = $rate->fetch_assoc();

    if(isset($_COOKIE["user_id"])){
        $count = $mysql->query("SELECT COUNT(rate) FROM `rates` WHERE `id_of_article` = ". $_GET["id_of_article"] . " AND `id_of_user` = ". $_COOKIE["user_id"]);
        $count = $count->fetch_assoc();
        $id_of_user = $_COOKIE["user_id"];
        $id_of_article = $_GET["id_of_article"];
        if($count["COUNT(rate)"] == 0){
            $sql = $mysql->query("INSERT INTO rates SET id_of_user = '$id_of_user', id_of_article = '$id_of_article', rate =" . $_GET["id"]);
            header("Location: /pages/article.php?id=$id_of_article");
            exit();
        }
        else{
            $sql = $mysql->query("UPDATE rates SET rate =" . $_GET["id"]. " WHERE `id_of_article` = ". $_GET["id_of_article"] . " AND `id_of_user` = ". $_COOKIE["user_id"]);
            header("Location: /pages/article.php?id=$id_of_article");
            exit();
        }
    }
    else{
        header("Location: /pages/article.php?id=$id_of_article");
        exit();
    }

?>