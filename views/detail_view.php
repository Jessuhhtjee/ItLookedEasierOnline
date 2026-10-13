<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Perfect Pancakes | ItLookedEasierOnline</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/detail.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="../js/recipe_detail.js" defer></script>
</head>

<body>

<header class="header_desktop">
    <div class="header-left">
        <div class="header_logo">
            <a href="../index.php">
                <img src="../Images/Logo.png" alt="" width="70px">
            </a>
        </div>

        <nav>
            <a href="../index.php">Home</a>
            <a href="recipes_view.php">Recipes</a>
            <a href="">Community</a>
        </nav>
    </div>

    <div class="header-right">
        <div class="search_recipes">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search recipes...">
        </div>

        <a id="wishlist" href="soon_page.php">
            <i class="fa-regular fa-heart"></i>
        </a>

        <a href="login-register.php" id="Login_button">
            Sign in
        </a>
    </div>
</header>

<header class="header_phone">
    <a href="../index.php">
        <i class="fa-solid fa-house"></i>
        <p>Home</p>
    </a>

    <a href="recipes_view.php">
        <i class="fa-solid fa-magnifying-glass"></i>
        <p>Recipes</p>
    </a>

    <a href="login-register.php">
        <i class="fa-solid fa-user"></i>
        <p>Profile</p>
    </a>
</header>

<main class="recipe-detail">

    <div class="recipe-breadcrumb">
        <a href="../index.php">Home</a>
        <i class="fa-solid fa-chevron-right"></i>
        <a href="recipes_view.php">Recipes</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span>The Perfect Pancakes</span>
    </div>

    <section class="recipe-hero">

        <div class="recipe-hero-image">
            <img src="../Images/pancakes.jpg"
                 alt="A stack of homemade pancakes with fresh berries">

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
                <span>Breakfast</span>
                <span>Vegetarian</span>
            </div>

            <p class="recipe-eyebrow">
                GOOD FOOD. REAL EXPECTATIONS.
            </p>

            <h1>The Perfect Pancakes</h1>

            <p class="recipe-description">
                Fluffy, golden pancakes topped with fresh berries.
                Simple ingredients, a little patience, and a very good breakfast.
            </p>

            <div class="recipe-author">
                <div class="author-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div>
                    <p class="author-name">Recipe by Alex</p>
                    <p class="author-date">Published October 12, 2026</p>
                </div>
            </div>

            <div class="recipe-stats">

                <div class="recipe-stat">
                    <i class="fa-regular fa-clock"></i>
                    <div>
                        <span>Prep time</span>
                        <strong>10 min</strong>
                    </div>
                </div>

                <div class="recipe-stat">
                    <i class="fa-solid fa-fire-burner"></i>
                    <div>
                        <span>Cook time</span>
                        <strong>15 min</strong>
                    </div>
                </div>

                <div class="recipe-stat">
                    <i class="fa-solid fa-chart-simple"></i>
                    <div>
                        <span>Difficulty</span>
                        <strong>Easy</strong>
                    </div>
                </div>

            </div>

            <button type="button" class="print-recipe" id="print-recipe">
                <i class="fa-solid fa-print"></i>
                Print recipe
            </button>

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

                    <span class="ingredient-count">6 ingredients</span>
                </div>

                <p class="section-description">
                    Everything you need to make the perfect pancakes.
                </p>

                <div class="ingredients-list">

                    <label class="ingredient-item">
                        <input type="checkbox" class="ingredient-check">
                        <span class="ingredient-amount">150 g</span>
                        <span class="ingredient-name">All-purpose flour</span>
                    </label>

                    <label class="ingredient-item">
                        <input type="checkbox" class="ingredient-check">
                        <span class="ingredient-amount">200 ml</span>
                        <span class="ingredient-name">Milk</span>
                    </label>

                    <label class="ingredient-item">
                        <input type="checkbox" class="ingredient-check">
                        <span class="ingredient-amount">1</span>
                        <span class="ingredient-name">Egg</span>
                    </label>

                    <label class="ingredient-item">
                        <input type="checkbox" class="ingredient-check">
                        <span class="ingredient-amount">1 tbsp</span>
                        <span class="ingredient-name">Sugar</span>
                    </label>

                    <label class="ingredient-item">
                        <input type="checkbox" class="ingredient-check">
                        <span class="ingredient-amount">1 tsp</span>
                        <span class="ingredient-name">Baking powder</span>
                    </label>

                    <label class="ingredient-item">
                        <input type="checkbox" class="ingredient-check">
                        <span class="ingredient-amount">20 g</span>
                        <span class="ingredient-name">Butter</span>
                    </label>

                </div>

                <div class="ingredients-progress">
                    <div class="progress-track">
                        <div class="progress-fill"
                             id="ingredients-progress-fill"></div>
                    </div>

                    <span id="ingredients-progress-text">
                        0 of 6 ingredients ready
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

                    <article class="instruction-step">
                        <div class="step-number">01</div>

                        <div>
                            <h3>Mix the dry ingredients</h3>
                            <p>
                                Add the flour, sugar and baking powder to a large
                                bowl. Mix everything together until evenly combined.
                            </p>
                        </div>
                    </article>

                    <article class="instruction-step">
                        <div class="step-number">02</div>

                        <div>
                            <h3>Add the wet ingredients</h3>
                            <p>
                                Add the milk and egg. Whisk until you have a smooth
                                batter. A few small lumps are completely fine.
                            </p>
                        </div>
                    </article>

                    <article class="instruction-step">
                        <div class="step-number">03</div>

                        <div>
                            <h3>Heat the pan</h3>
                            <p>
                                Melt a little butter in a frying pan over medium
                                heat. Make sure the pan is hot before adding batter.
                            </p>
                        </div>
                    </article>

                    <article class="instruction-step">
                        <div class="step-number">04</div>

                        <div>
                            <h3>Cook the pancakes</h3>
                            <p>