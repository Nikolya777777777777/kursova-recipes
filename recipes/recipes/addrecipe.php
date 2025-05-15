<?php 
include "app/controllers/recipes.php";
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
        <form action="addrecipe.php" class="add-recipe-form" method="POST" enctype="multipart/form-data">
            <input type="text" name="recipe-title" placeholder="Назва рецепта" required><br>
            <textarea name="recipe-description" placeholder="Опис рецепта" required></textarea><br>
            <select name="recipe-complexity" required>
                <option value="">Складність</option>
                <option value="1">Легка</option>
                <option value="2">Середня</option>
                <option value="3">Складна</option>
            </select><br>
            <input type="file" name="recipe-image" accept="image/*" required><br>
            <button type="submit" name="recipe-create">Додати рецепт</button>
        </form>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>