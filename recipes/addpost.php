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
        <form action="addpost.php" class="add-recipe-form" method="POST" enctype="multipart/form-data">
            <input type="text" name="post-title" placeholder="Назва рецепта" required><br>
            <textarea name="post-description" placeholder="Опис рецепта" required></textarea><br>
            <input type="file" name="post-image" accept="image/*" required><br>
            <button type="submit" name="post-create">Додати рецепт</button>
        </form>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>