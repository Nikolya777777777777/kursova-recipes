<?php
include "./app/database/db.php";

if (!$_SESSION){
    header('location' . 'log.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['like_id']))
{
    $id = $_GET['like_id'];
    $like = [
        'user_id' => $_SESSION['id'],
        'recipe_id' => $id
    ];

    $post = insert('favorites', $like);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['unlike_id']))
{
    $id = $_GET['unlike_id'];
    delete('favorites', $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['recdel_id']))
{
    $id = $_GET['recdel_id'];
    delete('recipe', $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-request']))
{
    $text = trim($_POST['request']);
    $request = [
        'user_id' => $_SESSION['id'],
        'text' => $text
    ];

    $post = insert('request', $request);
    header('location: ' . "index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recipe-create'])) {
    $cook_id = $_SESSION['id']; // Або інший спосіб отримати ID користувача
    $title = trim($_POST['recipe-title']);
    $description = trim($_POST['recipe-description']);
    $complexity = trim($_POST['recipe-complexity']);

    $errMsg = [];

    // Перевірка обов'язкових полів
    if ($title === '' || $description === '' || $complexity === '' || empty($_FILES['recipe-image']['name'])) {
        array_push($errMsg, "Усі поля, включно із зображенням, обов'язкові до заповнення!");
    } else {
        // Завантаження зображення
        $imgName = time() . '_' . $_FILES['recipe-image']['name']; // Унікальна назва
        $imgTmp = $_FILES['recipe-image']['tmp_name'];
        $uploadPath = './assets/img/recipes/' . $imgName;

        // Перевірка, чи існує папка, якщо ні — створити
        if (!is_dir('./assets/img/recipes')) {
            mkdir('./assets/img/recipes', 0777, true);
        }

        // Переміщаємо файл у папку
        move_uploaded_file($imgTmp, $uploadPath);

        // Підготовка даних до запису в БД
        $recipe = [
            'cook_id' => $cook_id,
            'image' => $imgName,
            'title' => $title,
            'description' => $description,
            'complexity' => $complexity
        ];

        // Вставка рецепта в базу даних
        insert('recipe', $recipe);

        // Перенаправлення на сторінку управління рецептами
        header('Location: myrecipes.php');
        exit;
    }
} else {
    $title = '';
    $description = '';
    $complexity = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recipe-update'])) {
    $title = trim($_POST['recipe-title']);
    $description = trim($_POST['recipe-description']);
    $complexity = trim($_POST['recipe-complexity']);
    $id = $_GET['id'];

    $errMsg = [];

    if ($title === '' || $description === '' || $complexity === '') {
        array_push($errMsg, "Усі поля (крім зображення) обов'язкові!");
    } else {
        $data = [
            'title' => $title,
            'description' => $description,
            'complexity' => $complexity
        ];

        // Якщо є нове зображення
        if (!empty($_FILES['recipe-image']['name'])) {
            $imgName = time() . '_' . $_FILES['recipe-image']['name'];
            $imgTmp = $_FILES['recipe-image']['tmp_name'];
            $uploadPath = './assets/img/recipes/' . $imgName;

            if (!is_dir('./assets/img/recipes')) {
                mkdir('./assets/img/recipes', 0777, true);
            }

            move_uploaded_file($imgTmp, $uploadPath);

            $data['image'] = $imgName;
        }

        update('recipe', $id, $data); // update — твоя функція оновлення

        header('Location: myrecipes.php');
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assign-category'])) {
    $recipeId = trim($_POST['recipe_id']);
    $categoryId = trim($_POST['category_id']);

    $errMsg = [];

    if ($recipeId === '' || $categoryId === '') {
        array_push($errMsg, "Оберіть рецепт і категорію.");
    } else {
        // Підготовка масиву для вставки
        $data = [
            'recipe_id' => $recipeId,
            'category_id' => $categoryId
        ];

        // Вставка в таблицю зв'язку
        insert('recipe_categories', $data);

        // Після успішної вставки можна перенаправити
        header('Location: myrecipes.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'])) {
    $id = $_POST['category_id'];
    delete('category', $id); 
    header('Location: manage_category.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-create'])) {
    $categoryName = trim($_POST['category-name']);

    $errMsg = [];

    if ($categoryName === '') {
        array_push($errMsg, "Назва категорії є обов'язковою до заповнення!");
    } else {
        $category = [
            'name' => $categoryName
        ];

        insert('category', $category);

        header('Location: manage_category.php');
        exit;
    }
} else {
    $categoryName = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-create'])) {
    $title = trim($_POST['post-title']);
    $description = trim($_POST['post-description']);

    $errMsg = [];

    if ($title === '' || $description === '' || empty($_FILES['post-image']['name'])) {
        array_push($errMsg, "Усі поля, включно із зображенням, обов'язкові до заповнення!");
    } else {
        $imgName = time() . '_' . $_FILES['post-image']['name'];
        $imgTmp = $_FILES['post-image']['tmp_name'];
        $uploadPath = './assets/img/posts/' . $imgName;

        if (!is_dir('./assets/img/posts')) {
            mkdir('./assets/img/posts', 0777, true);
        }

        move_uploaded_file($imgTmp, $uploadPath);

        $post = [
            'image' => $imgName,
            'title' => $title,
            'description' => $description
        ];

        insert('post', $post);

        header('Location: manage_post.php');
        exit;
    }
} else {
    $title = '';
    $description = '';
    $complexity = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['postdel_id']))
{
    $id = $_GET['postdel_id'];
    delete('post', $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['rcdel_id']))
{
    $id = $_GET['rcdel_id'];
    delete('recipe_categories', $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['userdel_id']))
{
    $id = $_GET['userdel_id'];
    delete('user', $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['req_del_id']))
{
    $id = $_GET['req_del_id'];
    delete('request', $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['req_appr_id']))
{
    $id = $_GET['req_appr_id'];
    $role = 1;

    $data = [
        'role_id' => $role
    ];

    update('user', $id, $data);

    header('Location: manage_request.php');
    exit;
}