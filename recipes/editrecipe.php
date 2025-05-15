<?php 
include "app/controllers/recipes.php";
if (!empty($_SERVER['HTTP_REFERER'])) {
    $backUrl = $_SERVER['HTTP_REFERER'];
    header("Location: $backUrl");
    exit;
} else {
    header("Location: index.php");
    exit;
}