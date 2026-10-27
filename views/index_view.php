<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ItLookedEasierOnline</title>

    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

<div class="container">

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

            <a id="Login_button" href="<?= isset($_SESSION['user_id']) ? './profile.php' : './login-register.php' ?>">
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


    <div class="hero">

        <div class="hero-tekst">

            <h1>Recipes that looked easier online.</h1>

            <p>
                Real recipes. Real results. (Most of the time.)
            </p>

        </div>


        <form class="searchbar" action="./recipes.php" method="get">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text"
                   name="q"
                   placeholder="What are you trying to cook?">

            <button type="submit">Search</button>

        </form>


        <div class="hero-bottom">

            <div class="stats-card">
                <i class="fa-solid fa-utensils"></i>
                <p>Simple ingredients</p>
            </div>

            <div class="stats-card">
                <i class="fa-regular fa-clock"></i>
                <p>Realistic time</p>
            </div>

            <div class="stats-card">
                <i class="fa-regular fa-heart"></i>
                <p>Tested by real people</p>
            </div>

        </div>

    </div>


    <div class="category">

        <div class="category-top">

            <h5>Browse by Category</h5>

            <a href="./recipes.php">
                View all recipes ->
            </a>

        </div>


        <div class="category-bottom">

            <a href="./recipes.php?category=breakfast" class="cat-card">
                <i class="fa-solid fa-mug-saucer"></i>
                <p>Breakfast</p>
            </a>

            <a href="./recipes.php?category=lunch" class="cat-card">
                <i class="fa-solid fa-bread-slice"></i>
                <p>Lunch</p>
            </a>

            <a href="./recipes.php?category=dinner" class="cat-card">
                <i class="fa-solid fa-pizza-slice"></i>
                <p>Dinner</p>
            </a>

            <a href="./recipes.php?category=dessert" class="cat-card">
                <i class="fa-solid fa-ice-cream"></i>
                <p>Desserts</p>
            </a>

            <a href="./recipes.php?category=snacks" class="cat-card cat-snacks">
                <i class="fa-solid fa-cookie-bite"></i>
                <p>Snacks</p>
            </a>

            <a href="./recipes.php?category=vegetarian" class="cat-card cat-desktop">
                <i class="fa-solid fa-seedling"></i>
                <p>Vegetarian</p>
            </a>

            <a href="./recipes.php?category=quick-easy" class="cat-card cat-desktop">
                <i class="fa-solid fa-bolt"></i>
                <p>Quick & easy</p>
            </a>

        </div>

    </div>


    <div class="popular-header">
        <h1 class="pr">Popular Recipes</h1>
        <a href="./recipes.php">View all</a>
    </div>


    <div class="Popular_Recipes">

        <?php if (empty($popular_recipes)): ?>
            <div class="home-empty">
                <p>No recipes yet. Be the first to add one!</p>
                <a class="home-empty-btn" href="<?= isset($_SESSION['user_id']) ? './add-recipe.php' : './login-register.php' ?>">
                    <?= isset($_SESSION['user_id']) ? 'Add a recipe' : 'Sign in to add one' ?>
                </a>
            </div>
        <?php else: ?>
            <?php foreach ($popular_recipes as $recipe): ?>
                <a class="PR_card" href="./recipe.php?id=<?= (int) $recipe['id'] ?>">

                    <img src="./<?= e(recipe_image_src($recipe['image'] ?? null)) ?>" alt="">

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

    </div>


    <div class="Newsletter">

        <div class="newsletter_text">

            <h1>Get new recipes</h1>
            <h1>Straight to your inbox.</h1>

            <p>
                No promises that they will actually be easy.
            </p>

        </div>


        <div class="Newsletter_input">

            <i class="fa-regular fa-envelope"></i>

            <input type="text"
                   placeholder="Your email address:">

            <a href="./soon.php">Sign up</a>

        </div>

    </div>


    <footer>

        <div class="Footer_logo">

            <img src="./Images/Logo.png"
                 alt=""
                 width="100px">

        </div>


        <div class="nav-footer">

            <a href="./index.php">Home</a>
            <a href="./recipes.php">Recipes</a>
            <a href="./soon.php">Community</a>

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

</div>

</body>
</html>
