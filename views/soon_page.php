<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming soon | ItLookedEasierOnline</title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/soon.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<header class="header_desktop">
    <div class="header-left">
        <div class="header_logo">
            <a href="./index.php"><img src="./Images/Logo.png" alt="" width="70px"></a>
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

        <a id="wishlist" href="<?= isset($_SESSION['user_id']) ? './profile.php#saved-recipes' : './login-register.php' ?>">
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

<div class="sooncontainer">
    <div class="container">
        <h1 id="title">This page isn't working yet!</h1>
        <p id="soon">(maybe) this feature will be released <strong>soon</strong></p>
        <a class="soon-home-link" href="./index.php">Back to Home</a>
    </div>
</div>

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
