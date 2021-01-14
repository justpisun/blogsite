<?php 
    require "../blocks/connect_to_db.php";

    require "../blocks/admin_check.php";

    $deleteArticle = $mysql->query("DELETE FROM articles WHERE id=". $_GET["id"]);

    Header("Location: /");
?>