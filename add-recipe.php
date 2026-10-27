<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login-register.php');
    exit;
}

require_once 'includes/config.php';
require_once 'includes/helpers.php';

$message = '';
$form_data = [
    'title' => '',
    'description' => '',
    'prepTime' => '',
    'difficulty' => 'easy',
    'servings' => '',
    'categories' => '',
    'dietary' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['title'] = trim($_POST['title'] ?? '');
    $form_data['description'] = trim($_POST['description'] ?? '');
    $form_data['prepTime'] = trim($_POST['prepTime'] ?? '');
    $form_data['difficulty'] = trim($_POST['difficulty'] ?? '');
    $form_data['servings'] = trim($_POST['servings'] ?? '');
    $form_data['categories'] = trim($_POST['categories'] ?? '');
    $form_data['dietary'] = trim($_POST['dietary'] ?? '');

    $ingredients = $_POST['ingredient'] ?? [];
    $amounts = $_POST['amount'] ?? [];
    $steps = $_POST['steps'] ?? [];

    $clean_ingredients = [];
    foreach ($ingredients as $index => $name) {
        $name = trim((string) $name);
        $amount = trim((string) ($amounts[$index] ?? ''));

        if ($name === '' && $amount === '') {
            continue;
        }

        if ($name === '' || $amount === '') {
            $message = 'Please fill in both the ingredient name and amount.';
            break;
        }

        $clean_ingredients[] = [
            'name' => $name,
            'amount' => $amount,
        ];
    }

    $clean_steps = [];
    if ($message === '') {
        foreach ($steps as $step) {
            $step = trim((string) $step);
            if ($step === '') {
                continue;
            }
            $clean_steps[] = $step;
        }
    }

    if ($message === '') {
        if ($form_data['title'] === '') {
            $message = 'Please enter a recipe title.';
        } elseif (empty($clean_ingredients)) {
            $message = 'Please add at least one ingredient.';
        } elseif (empty($clean_steps)) {
            $message = 'Please add at least one instruction step.';
        }
    }

    $image_path = null;

    if ($message === '' && isset($_FILES['recipeImage']) && $_FILES['recipeImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['recipeImage'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $message = 'Image upload failed.';
        } else {
            $allowed = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
            ];

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($file['tmp_name']);

            if (!isset($allowed[$mime])) {
                $message = 'Only JPG, PNG, or WEBP images are allowed.';
            } elseif ($file['size'] > 5 * 1024 * 1024) {
                $message = 'Image must be 5 MB or smaller.';
            } else {
                $upload_dir = __DIR__ . '/uploads/recipes';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                $filename = uniqid('recipe_', true) . '.' . $allowed[$mime];
                $destination = $upload_dir . '/' . $filename;

                if (!move_uploaded_file($file['tmp_name'], $destination)) {
                    $message = 'Could not save the image.';
                } else {
                    $image_path = 'uploads/recipes/' . $filename;
                }
            }
        }
    }

    if ($message === '') {
        try {
            $conn->beginTransaction();

            $stmt = $conn->prepare(
                'INSERT INTO `Ileo_Recipes`
                    (`user_id`, `title`, `description`, `prep_time`, `difficulty`, `servings`, `category`, `dietary_preference`, `image`)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
            );

            $servings = $form_data['servings'] !== '' ? (int) $form_data['servings'] : null;

            $stmt->execute([
                $_SESSION['user_id'],
                $form_data['title'],
                $form_data['description'] !== '' ? $form_data['description'] : null,
                $form_data['prepTime'] !== '' ? $form_data['prepTime'] : null,
                $form_data['difficulty'] !== '' ? $form_data['difficulty'] : null,
                $servings,
                $form_data['categories'] !== '' ? $form_data['categories'] : null,
                $form_data['dietary'] !== '' ? $form_data['dietary'] : null,
                $image_path,
            ]);

            $recipe_id = (int) $conn->lastInsertId();

            $ingredient_stmt = $conn->prepare(
                'INSERT INTO `Ileo_Recipe_Ingredients` (`recipe_id`, `ingredient_name`, `amount`)
                 VALUES (?, ?, ?)'
            );

            foreach ($clean_ingredients as $ingredient) {
                $ingredient_stmt->execute([
                    $recipe_id,
                    $ingredient['name'],
                    $ingredient['amount'],
                ]);
            }

            $step_stmt = $conn->prepare(
                'INSERT INTO `Ileo_Recipe_Steps` (`recipe_id`, `step_number`, `instruction`)
                 VALUES (?, ?, ?)'
            );

            foreach ($clean_steps as $index => $instruction) {
                $step_stmt->execute([
                    $recipe_id,
                    $index + 1,
                    $instruction,
                ]);
            }

            $conn->commit();

            header('Location: recipe.php?id=' . $recipe_id);
            exit;
        } catch (PDOException $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }

            if ($image_path && file_exists(__DIR__ . '/' . $image_path)) {
                unlink(__DIR__ . '/' . $image_path);
            }

            error_log($e->getMessage());
            $message = 'Could not save recipe: ' . $e->getMessage();
        }
    }
}

include 'views/add_recipe_view.php';
