<?php
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed.']);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Please sign in to save recipes.', 'login' => true]);
    exit;
}

require_once 'includes/config.php';

$input = json_decode(file_get_contents('php://input'), true);
$recipe_id = isset($input['recipe_id']) ? (int) $input['recipe_id'] : 0;

if ($recipe_id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid recipe.']);
    exit;
}

try {
    $check_recipe = $conn->prepare('SELECT `id` FROM `Ileo_Recipes` WHERE `id` = ?');
    $check_recipe->execute([$recipe_id]);

    if (!$check_recipe->fetch()) {
        http_response_code(404);
        echo json_encode(['error' => 'Recipe not found.']);
        exit;
    }

    $user_id = $_SESSION['user_id'];

    $existing = $conn->prepare(
        'SELECT `id` FROM `Ileo_Wishlist` WHERE `user_id` = ? AND `recipe_id` = ?'
    );
    $existing->execute([$user_id, $recipe_id]);
    $row = $existing->fetch();

    if ($row) {
        $delete = $conn->prepare('DELETE FROM `Ileo_Wishlist` WHERE `id` = ?');
        $delete->execute([$row['id']]);
        echo json_encode(['saved' => false]);
        exit;
    }

    $insert = $conn->prepare(
        'INSERT INTO `Ileo_Wishlist` (`user_id`, `recipe_id`) VALUES (?, ?)'
    );
    $insert->execute([$user_id, $recipe_id]);
    echo json_encode(['saved' => true]);
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Could not update wishlist.']);
}
