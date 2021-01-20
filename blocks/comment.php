<div class="written__comments">   
    <div class="left__comments"> 
        <img src="/images/user.png" class="user__img">
        <div class="allwritten__comment">
            <div class="authorof__comment">
                <?php
                    $users = $mysql->query("SELECT * FROM `users` WHERE `id` = ".$array_of_comments["id_of_user"]);
                    $array_of_users = $users->fetch_assoc();
                    if($array_of_users["admin"] == 1){
                        echo "<span class=\"admin\">" . $array_of_users["first_name"] . " " . $array_of_users["second_name"] . "[ADMIN]" . "<span>";
                    }else{
                        if($array_of_users["first_name"] == "" && $array_of_users["second_name"] == ""){
                            echo $array_of_users["login"];
                        }
                        else{
                            echo $array_of_users["first_name"] . " " . $array_of_users["second_name"];
                        }
                    }
                ?>
            </div>
            <div class="comment__text">
                <?php echo $array_of_comments["text"] ?>
            </div>
        </div>
    </div>
    <?php
        if(isset($_COOKIE["user_id"])){
            $user_obj = $mysql->query("SELECT * FROM `users` WHERE `id` = ". $_COOKIE["user_id"]);

            $user = $user_obj->fetch_assoc();   

            $id_comment = $array_of_comments["id"];
            $id_of_article = $_GET["id"];
            if($user["admin"]== 1){
                
                echo "<div class=\"right_position\"><a href=\"/pages/delete_comment.php?id=$id_comment&id_of_article=$id_of_article\" class=\"header__btn_div\">Удалить</a></div>";
            }
            else{
                if($array_of_users["id"] == $_COOKIE["user_id"]){
                    echo "<div class=\"right_position\"><a href=\"/pages/delete_comment.php?id=$id_comment&id_of_article=$id_of_article\" class=\"header__btn_div\">Удалить</a></div>";
                }
            }
        }
    ?>
</div>