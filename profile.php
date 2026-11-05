<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login-register.php');
    exit;
}

require_once 'includes/config.php';
require_once 'includes/helpers.php';

try {
    $stmt = $conn->prepare(
        'SELECT `id`, `title`, `description`, `prep_time`, `difficulty`, `image`
         FROM `Ileo_Recipes`
         WHERE `user_id` = ?
         ORDER BY `created_at` DESC'
    );
    $stmt->execute([$_SESSION['user_id']]);
    $my_recipes = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $my_recipes = [];
}

try {
    $wishlist_stmt = $conn->prepare(
        'SELECT r.`id`, r.`title`, r.`description`, r.`prep_time`, r.`difficulty`, r.`image`
         FROM `Ileo_Wishlist` w
         INNER JOIN `Ileo_Recipes` r ON r.`id` = w.`recipe_id`
         WHERE w.`user_id` = ?
         ORDER BY w.`created_at` DESC'
    );
    $wishlist_stmt->execute([$_SESSION['user_id']]);
    $saved_recipes = $wishlist_stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $saved_recipes = [];
}

include 'views/profile_view.php';
