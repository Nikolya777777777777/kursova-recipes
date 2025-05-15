<?php 
include "app/controllers/users.php";
$id = $_GET['id'];
$recipe = selectOne('recipe', ['id' => $id]);
$cook = selectOne('user', ['id' => $recipe['cook_id']]);

$complexityText = 'Невідомо';
if ($recipe['complexity'] == 1) {
    $complexityText = 'Складність приготування: легко.';
} elseif ($recipe['complexity'] == 2) {
    $complexityText = 'Складність приготування: середньо.';
} elseif ($recipe['complexity'] == 3) {
    $complexityText = 'Складність приготування: складно.';
}
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
            <h1 class="recipe-title"><?= htmlspecialchars($recipe['title']) ?></h1>
            <p class="recipe-description"><?= $complexityText ?></p>
            <p class="recipe-description"><?= htmlspecialchars($recipe['description']) ?></p>
            <br><p class="recipe-description">Автор рецепту: <?= $cook['surname'] ?> <?= $cook['name'] ?></p>
            <?php if (isset($_SESSION['id'])): 
                $likeInfo = getPostLikeInfo($id, $_SESSION['id']); ?>
                <div class="like-block">
                    <?php if ($likeInfo['likedByUser']): ?>
                        <?php $likeid = selectOne('favorites', [
                            'recipe_id' => $id,
                            'user_id' => $_SESSION['id']
                        ]); ?>
                        <a href="editrecipe.php?unlike_id=<?= $likeid['id'] ?>">❤️</a>
                    <?php else: ?>
                        <a href="editrecipe.php?like_id=<?= $id ?>">🤍</a>
                    <?php endif; ?>

                    <span> <?= $likeInfo['likesCount'] ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="recipe-image-block">
            <img src="./assets/img/recipes/<?= $recipe['image'] ?>" alt="Зображення рецепту">
        </div>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>