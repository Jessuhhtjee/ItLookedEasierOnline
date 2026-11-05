<?php
session_start();

require_once 'includes/config.php';
require_once 'includes/helpers.php';

$active_category = trim($_GET['category'] ?? '');
$search_q = trim($_GET['q'] ?? '');

$category_aliases = [
    'desserts' => 'dessert',
    'dessert' => 'dessert',
    'diner' => 'dinner',
    'dinner' => 'dinner',
    'quick' => 'quick&easy',
    'quick-easy' => 'quick&easy',
    'quick&easy' => 'quick&easy',
];

if ($active_category !== '' && isset($category_aliases[$active_category])) {
    $active_category = $category_aliases[$active_category];
}

try {
    $stmt = $conn->query(
        'SELECT r.`id`, r.`title`, r.`description`, r.`prep_time`, r.`difficulty`,
                r.`category`, r.`dietary_preference`, r.`image`, r.`created_at`,
                u.`Username` AS `author`
         FROM `Ileo_Recipes` r
         LEFT JOIN `Ileo_Users` u ON u.`ID` = r.`user_id`
         ORDER BY r.`created_at` DESC'
    );
    $recipes = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $recipes = [];
}

include 'views/recipes_view.php';
