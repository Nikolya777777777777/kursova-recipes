<?php 
include "app/controllers/users.php";
$recipes = selectAll('recipe');
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
        <div class="latest-recipes-block">
            <h2>Усі рецепти</h2>
            <div class="recipes-list">
            <?php foreach ($recipes as $recipe): ?>
                <a href="recipe.php?id=<?= $recipe['id'] ?>">
                    <div class="recipe-card">
                        <img src="./assets/img/recipes/<?= $recipe['image'] ?>" alt="Фото рецепту">
                        <div class="recipe-info">
                            <h3><?= htmlspecialchars($recipe['title']) ?></h3>
                            <p><?= mb_strimwidth(htmlspecialchars($recipe['description']), 0, 240, "...") ?></p>
                        </div>
                    </div>
                </a>
                <div class="delrec-div"><a href="editrecipe.php?recdel_id=<?=$recipe['id'] ;?>" class="delrec-btn" onclick="return confirm('Ви впевнені, що хочете видалити рецепт?');">Видалити рецепт</a></div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>