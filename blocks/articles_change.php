<article class="article">
    <img src="/images/blog/article_img<?php echo $row["id"]?>.jpg" class="article__img" alt="Article Image">
    <div class="article__block">
        <div class="article__title">
            <?php echo $row["title"]?>
        </div>
        <div class="article__maintext">
            <?php echo $row["text"]?>
        </div>
    </div>
    <div class="change_btn">
        <a href="/pages/change_article.php?id=<?php echo $row["id"]?>" class="header__btn_div color margin_right margin_bottom_add">Изменить</a>
        <a href="/pages/delete_article.php?id=<?php echo $row["id"]?>" class="header__btn_div color margin_right ">Удалить</a>
    </div>
</article>