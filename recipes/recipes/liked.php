<?php 
include "app/controllers/users.php";
$likes = selectAll('favorites', ['user_id' => $_SESSION['id']]);
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

    <div class="main-page-wrapper container">
        <div class="latest-recipes-block">
            <h2>Ваші збереження</h2>
            <div class="recipes-list">
            <?php foreach ($likes as $like): 
                $recipe = selectOne('recipe', ['id' => $like['recipe_id']]); ?>
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
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>