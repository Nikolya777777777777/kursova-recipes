<?php 
include "app/controllers/recipes.php";
$recipes = selectAll('recipe');
$categories = selectAll('category');
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
        <form action="addcategory.php" method="POST" class="assign-recipe-form add-recipe-form">
            <!-- Вибір рецепта -->
            <select name="recipe_id" required>
                <option value="">Оберіть рецепт</option>
                <?php foreach ($recipes as $recipe): ?>
                    <option value="<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></option>
                <?php endforeach; ?>
            </select><br>

            <!-- Вибір категорії -->
            <select name="category_id" required>
                <option value="">Оберіть категорію</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                <?php endforeach; ?>
            </select><br>

            <button type="submit" name="assign-category">Призначити категорію</button>
        </form>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>