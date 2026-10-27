<?php
$ingredient_count = count($ingredients);
$published = !empty($recipe['created_at'])
    ? date('F j, Y', strtotime($recipe['created_at']))
    : '';
$category_label = format_label($recipe['category'] ?? null);
$dietary_label = format_label($recipe['dietary_preference'] ?? null);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= e($recipe['title']) ?> | ItLookedEasierOnline</title>

    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/detail.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="./js/recipe_detail.js" defer></script>
</head>

<body>

<header class="header_desktop">
    <div class="header-left">
        <div class="header_logo">
            <a href="./index.php">
                <img src="./Images/Logo.png" alt="" width="70px">
            </a>
        </div>

        <nav>
            <a href="./index.php">Home</a>
            <a href="./recipes.php">Recipes</a>
            <a href="./soon.php">Community</a>
        </nav>
    </div>

    <div class="header-right">
        <div class="search_recipes">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search recipes...">
        </div>

        <a id="wishlist" href="./soon.php">
            <i class="fa-regular fa-heart"></i>
        </a>

        <a href="<?= isset($_SESSION['user_id']) ? './profile.php' : './login-register.php' ?>" id="Login_button">
            <?= isset($_SESSION['user_id']) ? 'Profile' : 'Sign in' ?>
        </a>
    </div>
</header>

<header class="header_phone">
    <a href="./index.php">
        <i class="fa-solid fa-house"></i>
        <p>Home</p>
    </a>

    <a href="./recipes.php">
        <i class="fa-solid fa-magnifying-glass"></i>
        <p>Recipes</p>
    </a>

    <a href="<?= isset($_SESSION['user_id']) ? './profile.php' : './login-register.php' ?>">
        <i class="fa-solid fa-user"></i>
        <p>Profile</p>
    </a>
</header>

<main class="recipe-detail">


    <section class="recipe-hero">

        <div class="recipe-hero-image">
            <img src="./<?= e(recipe_image_src($recipe['image'] ?? null)) ?>"
                 alt="<?= e($recipe['title']) ?>">

            <button type="button"
                    class="recipe-save"
                    id="save-recipe"
                    aria-label="Save recipe"
                    aria-pressed="false">
                <i class="fa-regular fa-heart"></i>
            </button>
        </div>

        <div class="recipe-hero-content">

            <div class="recipe-tags">
                <?php if ($category_label): ?>
                    <span><?= e($category_label) ?></span>
                <?php endif; ?>
                <?php if ($dietary_label): ?>
                    <span><?= e($dietary_label) ?></span>
                <?php endif; ?>
            </div>

            <p class="recipe-eyebrow">
                GOOD FOOD. REAL EXPECTATIONS.
            </p>

            <h1><?= e($recipe['title']) ?></h1>

            <p class="recipe-description">
                <?= e($recipe['description'] ?: 'No description yet.') ?>
            </p>

            <div class="recipe-author">
                <div class="author-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div>
                    <p class="author-name">Recipe by <?= e($recipe['author'] ?? 'Unknown') ?></p>
                    <?php if ($published): ?>
                        <p class="author-date">Published <?= e($published) ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="recipe-stats">

                <div class="recipe-stat">
                    <i class="fa-regular fa-clock"></i>
                    <div>
                        <span>Prep time</span>
                        <strong><?= e(format_prep_time($recipe['prep_time'] ?? null)) ?></strong>
                    </div>
                </div>

                <div class="recipe-stat">
                    <i class="fa-solid fa-utensils"></i>
                    <div>
                        <span>Servings</span>
                        <strong><?= e($recipe['servings'] !== null ? (string) $recipe['servings'] : '—') ?></strong>
                    </div>
                </div>

                <div class="recipe-stat">
                    <i class="fa-solid fa-chart-simple"></i>
                    <div>
                        <span>Difficulty</span>
                        <strong><?= e(format_label($recipe['difficulty'] ?? null) ?: '—') ?></strong>
                    </div>
                </div>

            </div>


        </div>

    </section>

    <section class="recipe-body">

        <div class="recipe-main-column">

            <section class="recipe-section ingredients-section">

                <div class="section-heading">
                    <div>
                        <p class="section-eyebrow">WHAT YOU NEED</p>
                        <h2>Ingredients</h2>
                    </div>

                    <span class="ingredient-count"><?= $ingredient_count ?> ingredient<?= $ingredient_count === 1 ? '' : 's' ?></span>
                </div>

                <p class="section-description">
                    Everything you need for this recipe.
                </p>

                <div class="ingredients-list">
                    <?php foreach ($ingredients as $ingredient): ?>
                        <label class="ingredient-item">
                            <input type="checkbox" class="ingredient-check">
                            <span class="ingredient-amount"><?= e($ingredient['amount']) ?></span>
                            <span class="ingredient-name"><?= e($ingredient['ingredient_name']) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="ingredients-progress">
                    <div class="progress-track">
                        <div class="progress-fill"
                             id="ingredients-progress-fill"></div>
                    </div>

                    <span id="ingredients-progress-text">
                        0 of <?= $ingredient_count ?> ingredients ready
                    </span>
                </div>

            </section>

            <section class="recipe-section instructions-section">

                <div class="section-heading">
                    <div>
                        <p class="section-eyebrow">LET'S GET COOKING</p>
                        <h2>Instructions</h2>
                    </div>
                </div>

                <p class="section-description">
                    Follow these steps and try not to burn the first pancake.
                </p>

                <div class="instructions-list">
                    <?php foreach ($steps as $step): ?>
                        <article class="instruction-step">
                            <div class="step-number"><?= str_pad((string) $step['step_number'], 2, '0', STR_PAD_LEFT) ?></div>

                            <div>
                                <h3>Step <?= (int) $step['step_number'] ?></h3>
                                <p><?= e($step['instruction']) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            </section>

        </div>

    </section>

</main>

<footer>

    <div class="Footer_logo">
        <img src="./Images/Logo.png" alt="" width="100px">
    </div>

    <div class="nav-footer">
        <a href="./index.php">Home</a>
        <a href="./recipes.php">Recipes</a>
        <a href="./soon.php">Community</a>
    </div>

    <div class="Social_media">
        <a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://facebook.com"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://tiktok.com"><i class="fa-brands fa-tiktok"></i></a>
    </div>

    <div class="End-text">
        <p>| Good food. Real expectations!</p>
    </div>

</footer>
</body>
</html>
