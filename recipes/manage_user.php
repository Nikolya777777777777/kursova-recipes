<?php 
include "app/controllers/users.php";
$users = selectAll('user');
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
        <div class="usertable-container">
            <table class="usertable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Логін</th>
                        <th>Пароль</th>
                        <th>Ім’я</th>
                        <th>Прізвище</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Дія</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="usertable-row">
                            <td><?= $user['id'] ?></td>
                            <td><?= htmlspecialchars($user['login']) ?></td>
                            <td><?= htmlspecialchars($user['password']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['surname']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>
                            <td>
                                <?php if ($user['role'] != 2): ?>
                                    <a href="editrecipe.php?userdel_id=<?= $user['id'] ?>" class="deleteuser-btn" 
                                    onclick="return confirm('Ви впевнені, що хочете видалити користувача?');">Видалити</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>