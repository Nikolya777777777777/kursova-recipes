<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'recipes';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
    $pdo->exec("SET NAMES utf8mb4");
}catch (PDOException $i){
    die("Помилка підключення до бази даних");
}