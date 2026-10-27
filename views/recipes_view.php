<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ItLookedEasierOnline_Recipes</title>

    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/recipes.css">
    <script src="./js/recipes_filter.js" defer></script>
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
            Profile
        </a>

    </div>

</header>


<main class="recipes-page">

    <section class="recipes-hero">

        <div class="recipes-hero-content">

            <p class="recipes-eyebrow">
                GOOD FOOD. REAL EXPECTATIONS.
            </p>

            <h1>
                All Recipes
            </h1>

            <p class="recipes-description">
                Simple ingredients. Questionable results. Just like we promised.
            </p>

        </div>

        <div class="recipes-hero-image">
        </div>

    </section>


    <section class="recipes-toolbar">

        <div class="recipes-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                    type="text"
                    placeholder="Search recipes..."
            >

        </div>

    </section>


    <section class="recipes-content">


        <aside class="recipes-filters">


            <div class="filter-section">

                <h3>
                    Categories
                </h3>

                <label>
                    <input type="checkbox" name="category" value="all" <?= empty($active_category) ? 'checked' : '' ?>>
                    <span>All Recipes</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="breakfast" <?= ($active_category ?? '') === 'breakfast' ? 'checked' : '' ?>>
                    <span>Breakfast</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="lunch" <?= ($active_category ?? '') === 'lunch' ? 'checked' : '' ?>>
                    <span>Lunch</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="dinner" <?= ($active_category ?? '') === 'dinner' ? 'checked' : '' ?>>
                    <span>Dinner</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="snacks" <?= ($active_category ?? '') === 'snacks' ? 'checked' : '' ?>>
                    <span>Snacks</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="dessert" <?= ($active_category ?? '') === 'dessert' ? 'checked' : '' ?>>
                    <span>Desserts</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="vegetarian" <?= ($active_category ?? '') === 'vegetarian' ? 'checked' : '' ?>>
                    <span>Vegetarian</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="quick&easy" <?= ($active_category ?? '') === 'quick&easy' ? 'checked' : '' ?>>
                    <span>Quick &amp; Easy</span>
                </label>

            </div>


            <div class="filter-section">

                <h3>
                    Prep Time
                </h3>

                <label>
                    <input type="checkbox" name="prep-time" value="under-15">
                    <span>Under 15 minutes</span>
                </label>

                <label>
                    <input type="checkbox" name="prep-time" value="15-30">
                    <span>15 – 30 minutes</span>
                </label>

                <label>
                    <input type="checkbox" name="prep-time" value="30-60">
                    <span>30 – 60 minutes</span>
                </label>

                <label>
                    <input type="checkbox" name="prep-time" value="over-60">
                    <span>Over 1 hour</span>
                </label>

            </div>


            <div class="filter-section">

                <h3>
                    Difficulty
                </h3>

                <label>
                    <input type="checkbox" name="difficulty" value="easy">
                    <span>Easy</span>
                </label>

                <label>
                    <input type="checkbox" name="difficulty" value="medium">
                    <span>Medium</span>
                </label>

                <label>
                    <input type="checkbox" name="difficulty" value="hard">
                    <span>Hard</span>
                </label>

                <label>
                    <input type="checkbox" name="difficulty" value="apparentlyimpossible">
                    <span>Apparently Impossible</span>
                </label>

            </div>


            <div class="filter-section">

                <h3>
                    Dietary
                </h3>

                <label>
                    <input type="checkbox" name="dietary" value="vegetarian">
                    <span>Vegetarian</span>
                </label>

                <label>
                    <input type="checkbox" name="dietary" value="vegan">
                    <span>Vegan</span>
                </label>

                <label>
                    <input type="checkbox" name="dietary" value="gluten-free">
                    <span>Gluten-Free</span>
                </label>

                <label>
                    <input type="checkbox" name="dietary" value="dairy-free">
                    <span>Dairy-Free</span>
                </label>

            </div>


            <button type="button" class="clear-filters">
                Clear filters
            </button>


            <div class="filter-tip">

                <h4>
                    Pro tip:
                </h4>

                <p>
                    Use more garlic. It won't fix everything, but it helps.
                </p>

            </div>


        </aside>


        <div class="recipes-results">


            <div class="recipes-results-header">

                <h2>
                    <?= count($recipes) ?> recipe<?= count($recipes) === 1 ? '' : 's' ?> found
                </h2>


            </div>


            <div class="recipes-grid">
                <?php if (empty($recipes)): ?>
                    <p>No recipes yet. <a href="./add-recipe.php">Add the first one</a>.</p>
                <?php else: ?>
                    <?php foreach ($recipes as $recipe): ?>
                        <a class="PR_card"
                           href="./recipe.php?id=<?= (int) $recipe['id'] ?>"
                           style="text-decoration:none;color:inherit;display:block;"
                           data-title="<?= e($recipe['title']) ?>"
                           data-description="<?= e($recipe['description'] ?? '') ?>"
                           data-category="<?= e($recipe['category'] ?? '') ?>"
                           data-prep-time="<?= e($recipe['prep_time'] ?? '') ?>"
                           data-difficulty="<?= e($recipe['difficulty'] ?? '') ?>"
                           data-dietary="<?= e($recipe['dietary_preference'] ?? '') ?>"
                           data-created="<?= e(isset($recipe['created_at']) ? (string) strtotime($recipe['created_at']) : '0') ?>">
                            <img src="./<?= e(recipe_image_src($recipe['image'] ?? null)) ?>" alt="<?= e($recipe['title']) ?>">
                            <h2><?= e($recipe['title']) ?></h2>
                            <p><?= e($recipe['description'] ?: 'No description yet.') ?></p>
                            <div class="PR-bot">
                                <div class="pr-stats">
                                    <i class="fa-regular fa-clock"></i>
                                    <p><?= e(format_prep_time($recipe['prep_time'] ?? null)) ?></p>
                                </div>
                                <div class="pr-stats">
                                    <i class="fa-solid fa-trophy"></i>
                                    <p><?= e(format_label($recipe['difficulty'] ?? null) ?: '—') ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                <p class="recipes-empty-filter" hidden>No recipes match your filters.</p>
            </div>

        </div>

    </section>

</main>


<div class="Newsletter">

    <div class="newsletter_text">

        <h1>
            Get new recipes
        </h1>

        <h1>
            Straight to your inbox.
        </h1>

        <p>
            No promises that they will actually be easy.
        </p>

    </div>


    <div class="Newsletter_input">

        <i class="fa-regular fa-envelope"></i>

        <input
                type="text"
                placeholder="Your e-mail adres:"
        >

        <a href="">
            SignUp
        </a>

    </div>

</div>


<footer>

    <div class="Footer_logo">

        <img
                src="./Images/Logo.png"
                alt=""
                width="100px"
        >

    </div>


    <div class="nav-footer">

        <a href="./index.php">
            Home
        </a>

        <a href="./recipes.php">
            Recipes
        </a>

        <a href="./soon.php">
            Community
        </a>

    </div>


    <div class="Social_media">

        <a href="https://instagram.com">
            <i class="fa-brands fa-instagram"></i>
        </a>

        <a href="https://facebook.com">
            <i class="fa-brands fa-facebook"></i>
        </a>

        <a href="https://tiktok.com">
            <i class="fa-brands fa-tiktok"></i>
        </a>

    </div>


    <div class="End-text">

        <p>
            | Good food. Real expectations!
        </p>

    </div>

</footer>

</body>
</html>
