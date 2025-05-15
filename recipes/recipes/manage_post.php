<?php 
include "app/controllers/recipes.php";
$posts = selectAll('post');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <title>CookMate</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="main-page-wrapper-vertical container">
        <a href="addpost.php" class="addrecipe-btn">➕ Додати пост</a>
        <div class="latest-recipes-block">
            <h2>Усі пости</h2>
            <div class="recipes-list">
                <?php foreach ($posts as $post): ?>
                    <a href="post.php?id=<?= $post['id'] ?>">
                        <div class="recipe-card">
                            <img src="./assets/img/posts/<?= $post['image'] ?>" alt="Фото посту">
                            <div class="recipe-info">
                                <h3><?= htmlspecialchars($post['title']) ?></h3>
                                <p><?= mb_strimwidth(htmlspecialchars($post['description']), 0, 240, "...") ?></p>
                            </div>
                        </div>
                    </a>
                    <div class="delrec-div"><a href="editrecipe.php?postdel_id=<?=$post['id'] ;?>" class="delrec-btn" onclick="return confirm('Ви впевнені, що хочете видалити пост?');">Видалити пост</a></div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>