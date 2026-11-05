<?php
session_start();

require_once 'includes/config.php';
require_once 'includes/helpers.php';

$recipe_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($recipe_id <= 0) {
    header('Location: recipes.php');
    exit;
}

try {
    $stmt = $conn->prepare(
        'SELECT r.*, u.`Username` AS `author`
         FROM `Ileo_Recipes` r
         LEFT JOIN `Ileo_Users` u ON u.`ID` = r.`user_id`
         WHERE r.`id` = ?'
    );
    $stmt->execute([$recipe_id]);
    $recipe = $stmt->fetch();

    if (!$recipe) {
        include 'views/404_view.php';
        exit;
    }

    $ingredient_stmt = $conn->prepare(
        'SELECT `ingredient_name`, `amount`
         FROM `Ileo_Recipe_Ingredients`
         WHERE `recipe_id` = ?
         ORDER BY `id` ASC'
    );
    $ingredient_stmt->execute([$recipe_id]);
    $ingredients = $ingredient_stmt->fetchAll();

    $step_stmt = $conn->prepare(
        'SELECT `step_number`, `instruction`
         FROM `Ileo_Recipe_Steps`
         WHERE `recipe_id` = ?
         ORDER BY `step_number` ASC'
    );
    $step_stmt->execute([$recipe_id]);
    $steps = $step_stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    include 'views/404_view.php';
    exit;
}

$is_saved = false;
if (isset($_SESSION['user_id'])) {
    try {
        $saved_stmt = $conn->prepare(
            'SELECT `id` FROM `Ileo_Wishlist` WHERE `user_id` = ? AND `recipe_id` = ?'
        );
        $saved_stmt->execute([$_SESSION['user_id'], $recipe_id]);
        $is_saved = (bool) $saved_stmt->fetch();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $is_saved = false;
    }
}

include 'views/detail_view.php';
