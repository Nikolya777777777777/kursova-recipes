<?php 
include "app/controllers/users.php";
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
        <div class="cat-admin-wrapper">
            <h1 class="cat-admin-title">Категорії</h1>

            <div class="cat-admin-panel">
                <div class="cat-admin-controls">
                    <a href="add_category.php" class="cat-admin-add-btn">➕ Додати категорію</a>
                </div>

                <div class="cat-admin-list">
                    <?php foreach ($categories as $category): ?>
                    <div class="cat-admin-item">
                        <div class="cat-admin-name"><?= htmlspecialchars($category['name']) ?></div>
                            <form action="editrecipe.php" method="POST" class="cat-admin-form">
                                <input type="hidden" name="category_id" value="<?= $category['id'] ?>">
                                <button type="submit" class="cat-admin-delete-btn" onclick="return confirm('Ви впевнені, що хочете видалити категорію?');">Видалити</button>
                            </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>