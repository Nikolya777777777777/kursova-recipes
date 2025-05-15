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
    <title>Вхід - CookMate</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <br><br><br><br>
    <?php $ifis =  selectOne('request', ['user_id' => $_SESSION['id']]);
    if (empty($ifis)): ?>
        <div class="login-container">
            <h2>Запит на роль повара</h2>

            <form action="request.php" method="POST">
                <textarea id="request" name="request"
                style="
                font-size:16px;
                color: black;
                padding: 7px;
                height: 300px;
                width: 486px;" ></textarea>

                <button type="submit" name="button-request" class="form-button">Відправити</button>
            </form>
        </div>
    <br><br><br><br>
    <?php else: ?>
        <div class="container">
            <h2 class="requesth2">Ви вже відправили запит, проте його ще не розглянули</h2>
        </div>
    <?php endif; ?>

    <?php include("app/include/footer.php"); ?>
</body>
</html>