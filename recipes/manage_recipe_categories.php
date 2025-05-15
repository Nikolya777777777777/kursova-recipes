<?php 
include "app/controllers/users.php";
$categories = selectAll('category');
$recipes = selectAll('recipe');
$recipe_categories = selectAll('recipe_categories');
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
        <div class="rc-container">
            <?php foreach ($recipe_categories as $rc): ?>
                <?php
                    // Пошук рецепта за id
                    $recipeTitle = '';
                    $recipeId = '';
                    foreach ($recipes as $recipe) {
                        if ($recipe['id'] == $rc['recipe_id']) {
                            $recipeTitle = $recipe['title'];
                            $recipeId = $recipe['id'];
                            break;
                        }
                    }

                    // Пошук категорії за id
                    $categoryName = '';
                    foreach ($categories as $category) {
                        if ($category['id'] == $rc['category_id']) {
                            $categoryName = $category['name'];
                            break;
                        }
                    }
                ?>
                <div class="rc-item">
                    <div class="rc-title"><?= htmlspecialchars($recipeTitle) ?></div>
                    <div class="rc-category">Категорія: <?= htmlspecialchars($categoryName) ?></div>
                    <div class="delrec1-div">
                        <a href="editrecipe.php?rcdel_id=<?= $rc['id'] ?>" class="delrec1-btn" onclick="return confirm('Ви впевнені, що хочете видалити категорію рецепта?');">Видалити категорію рецепта</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>