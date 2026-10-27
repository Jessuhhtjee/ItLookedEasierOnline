<?php
session_start();

require_once 'includes/config.php';
require_once 'includes/helpers.php';

try {
    $stmt = $conn->query(
        'SELECT r.`id`, r.`title`, r.`description`, r.`prep_time`, r.`difficulty`, r.`image`
         FROM `Ileo_Recipes` r
         ORDER BY r.`created_at` DESC
         LIMIT 8'
    );
    $popular_recipes = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $popular_recipes = [];
}

include 'views/index_view.php';
