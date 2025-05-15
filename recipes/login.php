<?php 
include "app/controllers/users.php";
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
    <title>Вхід - CookMate</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="login-container">
        <h2>Вхід</h2>

        <form action="login.php" method="POST">
            <label for="login">Логін</label>
            <input type="text" name="login" id="login" required>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>

            <?php if (!empty($errMsg)): ?>
                <div class="error-message">
                <?php foreach ($errMsg as $err): ?>
                    <p><?= htmlspecialchars($err) ?></p>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <button type="submit" name="button-log" class="form-button">Увійти</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>