<?php
include "./app/database/db.php";

$errMsg = [];

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log']))
{
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if ($login === '')
    {
        array_push( $errMsg, "Поле логіну не може бути пустим!");
    } 
    elseif ($password === '')
    {
        array_push( $errMsg, "Поле пароль не може бути пустим!");
    } 
    else 
    {
        $existence = selectOne('user', ['login' => $login]);
        if ($existence &&  $password === $existence['password']){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['login'];
            $_SESSION['role'] = $existence['role'];

            header('location: ' . "index.php");
        } 
        else 
        {
            array_push( $errMsg, "Пошта або пароль введені невірно!");
        }
    }
} else {
    $email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $role = 0;

    if ($login === '' || $password === '' || $name === '' || $surname === '' || $email === '') {
        array_push($errMsg, "Усі поля обов’язкові для заповнення.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errMsg, "Некоректна email-адреса.");
    } elseif (selectOne('user', ['login' => $login])) {
        array_push($errMsg, "Користувач з таким логіном вже існує.");
    } elseif (selectOne('user', ['email' => $email])) {
        array_push($errMsg, "Користувач з такою email-адресою вже існує.");
    } else {
        $user = [
            'login' => $login,
            'password' => $password,
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'role' => $role
        ];

        $id = insert('user', $user);
        $existence = selectOne('user', ['login' => $login]);
        $_SESSION['id'] = $existence['id'];
        $_SESSION['login'] = $existence['login'];
        $_SESSION['role'] = $existence['role'];

        header('Location: index.php');
        exit;
    }
}
