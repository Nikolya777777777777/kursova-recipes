<?php 
include "app/controllers/users.php";
$requests = selectAll('request');
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
        <div class="two-row-table-container">
            <table class="two-row-table">
                <tbody>
                    <?php foreach ($requests as $req): ?>
                        <?php $user = selectOne('user', ['id' => $req['user_id']]); ?>
                        <?php if ($user['role'] == 0): ?>
                            <tr>
                                <td><strong></strong> <?= htmlspecialchars($user['name']) ?></td>
                                <td><strong></strong> <?= htmlspecialchars($user['surname']) ?></td>
                                <td><strong></strong> <?= htmlspecialchars($user['login']) ?></td>
                                <td>
                                    <a href="editrecipe.php?req_del_id=<?= $req['id'] ?>" class="delete-btn" onclick="return confirm('Видалити цей запис?');">Видалити</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="request-text"><?= htmlspecialchars($req['text']) ?></td>
                                <td>
                                    <a href="editrecipe.php?req_appr_id=<?= $user['id'] ?>" class="approve-btn">Затвердити</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>