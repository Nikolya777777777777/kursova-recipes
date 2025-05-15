<?php 
include "app/controllers/recipes.php";
$id = $_GET['id'];
$recipe = selectOne('recipe', ['id' => $id]);

if (!$recipe) {
    echo "Рецепт не знайдено.";
    exit;
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

    <div class="container">
        <form action="editrecipe.php?id=<?= $recipe['id'] ?>" class="add-recipe-form" method="POST" enctype="multipart/form-data">
            <input type="text" name="recipe-title" value="<?= htmlspecialchars($recipe['title']) ?>" required><br>
            <textarea name="recipe-description" required><?= htmlspecialchars($recipe['description']) ?></textarea><br>
            <select name="recipe-complexity" required>
                <option value="">Складність</option>
                <option value="1" <?= $recipe['complexity'] == 1 ? 'selected' : '' ?>>Легка</option>
                <option value="2" <?= $recipe['complexity'] == 2 ? 'selected' : '' ?>>Середня</option>
                <option value="3" <?= $recipe['complexity'] == 3 ? 'selected' : '' ?>>Складна</option>
            </select><br>
            <input type="file" name="recipe-image" accept="image/*"><br>
            <button type="submit" name="recipe-update">Оновити рецепт</button>
        </form>
    </div>


    <?php include("app/include/footer.php"); ?>
</body>
</html>