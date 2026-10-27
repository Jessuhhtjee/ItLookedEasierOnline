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

include 'views/profile_view.php';
