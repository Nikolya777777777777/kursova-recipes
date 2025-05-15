<?php 
include "app/controllers/users.php";
$id = $_GET['id'];
$post = selectOne('post', ['id' => $id]);
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

    <div class="single-recipe-container container">
        <div class="recipe-content-block">
            <h1 class="recipe-title"><?= htmlspecialchars($post['title']) ?></h1>
            <p class="recipe-description"><?= htmlspecialchars($post['description']) ?></p>
        </div>
        <div class="recipe-image-block">
            <img src="./assets/img/posts/<?= $post['image'] ?>" alt="Зображення рецепту">
        </div>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>