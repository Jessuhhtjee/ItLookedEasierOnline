<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ItLookedEasierOnline | Profile</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/footer.css">
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

        <form class="search_recipes" action="./recipes.php" method="get" role="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="q" placeholder="Search recipes..." aria-label="Search recipes">
        </form>

        <a id="wishlist" href="./profile.php#saved-recipes">
            <i class="fa-regular fa-heart"></i>
        </a>

        <a href="./profile.php" id="Login_button">
            Profile
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

    <a href="./profile.php">
        <i class="fa-solid fa-user"></i>
        <p>Profile</p>
    </a>

</header>

<div class="profile">
    <aside class="profile-left">
        <p class="profile-nav-label">Account</p>

        <a href="./profile.php" class="profile-option active">
            <i class="fa-regular fa-user"></i>
            <p>Profile</p>
        </a>

        <a href="./profile.php#my-recipes" class="profile-option">
            <i class="fa-solid fa-book"></i>
            <p>My recipes</p>
        </a>

        <a href="./profile.php#saved-recipes" class="profile-option">
            <i class="fa-regular fa-heart"></i>
            <p>Saved recipes</p>
        </a>

        <a href="./soon.php" class="profile-option">
            <i class="fa-solid fa-gear"></i>
            <p>Settings</p>
        </a>

        <a href="./add-recipe.php" class="add-btn sidebar-add">+ Add Recipe</a>
    </aside>

    <div class="profile-right">
        <section class="profile-hero">
            <div class="profile-stats">
                <img class="profile-picture" src="./Images/card-template.jpg" alt="">
                <div class="profil-tekst">
                    <p class="profile-eyebrow">Your kitchen corner</p>
                    <h1><?= e($_SESSION['username'] ?? 'Username') ?></h1>
                    <p>Share recipes that looked easier online.</p>
                    <div class="profile-meta">
                        <span><?= count($my_recipes) ?> recipe<?= count($my_recipes) === 1 ? '' : 's' ?></span>
                        <span><?= count($saved_recipes) ?> saved</span>
                        <span><?= e($_SESSION['email'] ?? '') ?></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-recipes" id="my-recipes">
            <div class="mr-upper">
                <div>
                    <p class="section-eyebrow">COOKBOOK</p>
                    <h3>My Recipes</h3>
                </div>
                <a class="add-btn" href="./add-recipe.php">+ Add Recipe</a>
            </div>

            <div class="mr-lower">
                <?php if (empty($my_recipes)): ?>
                    <div class="empty-recipes">
                        <i class="fa-solid fa-utensils"></i>
                        <h4>No recipes yet</h4>
                        <p>Your first “it looked easier online” moment starts here.</p>
                        <a class="add-btn" href="./add-recipe.php">Create a recipe</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($my_recipes as $recipe): ?>
                        <a class="mr-card" href="./recipe.php?id=<?= (int) $recipe['id'] ?>">
                            <img src="./<?= e(recipe_image_src($recipe['image'] ?? null)) ?>" alt="">
                            <div class="mr-card-body">
                                <h4><?= e($recipe['title']) ?></h4>
                                <p><?= e($recipe['description'] ?: 'No description yet.') ?></p>
                                <p class="mr-stats">
                                    <i class="fa-regular fa-clock"></i>
                                    <?= e(format_prep_time($recipe['prep_time'] ?? null)) ?>
                                    <span>·</span>
                                    <?= e(format_label($recipe['difficulty'] ?? null) ?: '—') ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="create-recipe">
            <div class="cr-left">
                <i class="fa-solid fa-plus"></i>
                <div class="tekst-create">
                    <h3>Create new recipe</h3>
                    <p>Share your favorite (or experimental) recipe with the community.</p>
                </div>
            </div>
            <a class="add-btn" href="./add-recipe.php">Add Recipe</a>
        </section>

        <section class="saved-recipes" id="saved-recipes">
            <div class="saved-header">
                <div>
                    <p class="section-eyebrow">WISHLIST</p>
                    <h3>Saved recipes</h3>
                </div>
            </div>

            <div class="mr-lower">
                <?php if (empty($saved_recipes)): ?>
                    <div class="empty-recipes">
                        <i class="fa-regular fa-heart"></i>
                        <h4>No saved recipes yet</h4>
                        <p>Tap the heart on a recipe page to save it here.</p>
                        <a class="add-btn" href="./recipes.php">Browse recipes</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($saved_recipes as $recipe): ?>
                        <a class="mr-card" href="./recipe.php?id=<?= (int) $recipe['id'] ?>">
                            <img src="./<?= e(recipe_image_src($recipe['image'] ?? null)) ?>"
                                 alt="<?= e($recipe['title']) ?>">
                            <div class="mr-card-body">
                                <h4><?= e($recipe['title']) ?></h4>
                                <p><?= e($recipe['description'] ?: 'No description yet.') ?></p>
                                <p class="mr-stats">
                                    <i class="fa-regular fa-clock"></i>
                                    <?= e(format_prep_time($recipe['prep_time'] ?? null)) ?>
                                    <span>·</span>
                                    <?= e(format_label($recipe['difficulty'] ?? null) ?: '—') ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
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
</body>
</html>
