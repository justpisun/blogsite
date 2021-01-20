<div class="written__comments">   
    <div class="left__comments"> 
        <img src="/images/user.png" class="user__img">
        <div class="allwritten__comment">
            <div class="authorof__comment">
                <?php
                    $userResult = $mysql->query("SELECT * FROM `users` WHERE `id` = ".$comments["userId"]);
                    $users = $userResult->fetch_assoc();
                    if($users["admin"] == 1){
                        echo "<span class=\"admin\">" . $users["first_name"] . " " . $users["second_name"] . "[ADMIN]" . "<span>";
                    }else{
                        if($users["first_name"] == "" && $users["second_name"] == ""){
                            echo $users["login"];
                        }
                        else{
                            echo $users["first_name"] . " " . $users["second_name"];
                        }
                    }
                ?>
            </div>
            <div class="comment__text">
                <?php echo $comments["text"] ?>
            </div>
        </div>
    </div>
    <?php
        if(isset($_COOKIE["user_id"])){
            $user_obj = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE["user_id"]);

            $user = $user_obj->fetch_assoc();   

            $id_comment = $comments["id"];
            $articleId = $_GET["id"];
            if($user["admin"]== 1 || $users["id"] == $_COOKIE["user_id"]){
                echo "<div class=\"right_position\"><a href=\"/pages/delete_comment.php?id=$id_comment&articleId=$articleId\" class=\"header__btn_div\">Удалить</a></div>";
            }
        }
    ?>
</div>