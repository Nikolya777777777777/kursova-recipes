<?php 
include "app/controllers/recipes.php";
$recipes = array_reverse(selectAll('recipe'));
$categories = selectAll('category');
$posts = array_reverse(selectAll('post'));
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


    <div class="container">
        <img src="./assets/img/index.jpg" alt="" class="mainimg">
    </div>
    <div class="main-page-wrapper container">
        <div class="latest-recipes-block">
            <h2>Останні рецепти</h2>
            <div class="recipes-list">
            <?php foreach (array_slice($recipes, 0, 4) as $recipe): ?>
                <a href="recipe.php?id=<?= $recipe['id'] ?>">
                    <div class="recipe-card">
                        <img src="./assets/img/recipes/<?= $recipe['image'] ?>" alt="Фото рецепту">
                        <div class="recipe-info">
                            <h3><?= htmlspecialchars($recipe['title']) ?></h3>
                            <p><?= mb_strimwidth(htmlspecialchars($recipe['description']), 0, 240, "...") ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="sidebar-block">
            <div class="categories-section">
            <h3>Категорії</h3>
            <ul>
                <?php foreach ($categories as $cat): ?>
                <li><a href="category.php?id=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            </div>

            <div class="posts-section">
            <h3>Останні пости</h3>
            <?php foreach (array_slice($posts, 0, 4) as $post): ?>
                <a href="post.php?id=<?= $post['id'] ?>">
                    <div class="post-preview">
                        <img src="./assets/img/posts/<?= $post['image'] ?>" alt="Фото поста">
                        <p><?= htmlspecialchars($post['title']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
            </div>
        </div>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>