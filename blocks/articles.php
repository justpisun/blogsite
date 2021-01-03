<article class="article">
    <img src="<?php echo $row["img_link"]?>" class="article__img" alt="Article Image">
    <div class="article__block">
        <div class="article__tittle">
            <?php echo $row["tittle"]?>
        </div>
        <div class="article__maintext">
            <?php echo $row["text"]?>
        </div>
        <a href="./article.php?id=<?php echo $row["id"]?>" class="link__arcticle">
            Читать далее...
        </a>
    </div>
</article>