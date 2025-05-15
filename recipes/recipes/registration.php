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
    <title>Реєстрація - CookMate</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="registration-container">
        <h2>Реєстрація</h2>

        <form action="registration.php" method="POST">
            <label for="login">Логін</label>
            <input type="text" name="login" id="login" required>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>

            <label for="name">Ім'я</label>
            <input type="text" name="name" id="name" required>

            <label for="surname">Прізвище</label>
            <input type="text" name="surname" id="surname" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <?php if (!empty($errMsg)): ?>
                <div class="error-message">
                <?php foreach ($errMsg as $err): ?>
                    <p><?= htmlspecialchars($err) ?></p>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <button type="submit" name="button-reg" class="form-button">Зареєструватись</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>