<?php 
include "app/controllers/users.php";
$recipes = selectAll('recipe', ['cook_id' => $_SESSION['id']]);
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
        <h1 style="text-align: center; margin-bottom: 30px;">Панель адміністратора</h1>

        <div class="admin-menu">
            <a href="manage_category.php">Категорії</a>
            <a href="manage_post.php">Пости</a>
            <a href="manage_recipe.php">Рецепти</a>
            <a href="manage_recipe_categories.php">Категорії рецептів</a>
            <a href="manage_request.php">Запити</a>
            <a href="manage_user.php">Користувачі</a>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>