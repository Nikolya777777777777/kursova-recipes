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
        <form action="add_category.php" class="add-recipe-form" method="POST" enctype="multipart/form-data">
            <input type="text" name="category-name" placeholder="Назва категорії" required><br>
            <button type="submit" name="category-create">Додати рецепт</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>