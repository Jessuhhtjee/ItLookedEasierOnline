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
            <a href="recipes_view.php">Recipes</a>
            <a href="soon_page.php">Community</a>
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
            Profile
        </a>

    </div>
    
</header>


<header class="header_phone">

    <a href="">
        <i class="fa-solid fa-house"></i>
        <p>Home</p>
    </a>

    <a href="">
        <i class="fa-solid fa-magnifying-glass"></i>
        <p>Recipes</p>
    </a>

    <a href="">
        <i class="fa-solid fa-user"></i>
        <p>Profile</p>
    </a>

</header>

<div class="profile">
    <div class="profile-left">
        <a href="" class="profile-option">
            <i class="fa-regular fa-user"></i>
            <p>Profile</p>
        </a>

        <a href="" class="profile-option">
            <i class="fa-solid fa-book"></i>
            <p>My recipes</p>
        </a>

        <a href="" class="profile-option">
            <i class="fa-regular fa-heart"></i>
            <p>Saved recipes</p>
        </a>

        <a href="" class="profile-option">
            <i class="fa-solid fa-gear"></i>
            <p>Settings</p>
        </a>

        <a href="" class="add-btn">+ Add Recipe</a>
    </div>
    <div class="profile-right">
        <div class="profile-stats">
            <img class="profile-picture" src="./Images/card-template.jpg" alt="" >
            <div class="profil-tekst">
            <h1>Username</h1>
            <p>Hier nog iets van tekst ofzo? een of andere inspirerende quote ofzo?</p>
            </div>

        </div>

        <div class="my-recipes">
            <div class="mr-upper">
                <h3>My Recipes</h3>
                <a class="add-btn" href="">+ Add Recipe</a>
            </div>
            <div class="mr-lower">
                <div class="mr-card">
                    <img src="./Images/card-template.jpg" alt="">
                    <h4>The Classic hamburger</h4>
                    <p>A quick and easy hamburger recipe that defintely took longer</p>
                    <p class="mr-stats">30 min | Medium</p>
                </div>

                <div class="mr-card">
                    <img src="./Images/card-template.jpg" alt="">
                    <h4>The Classic hamburger</h4>
                    <p>A quick and easy hamburger recipe that defintely took longer</p>
                    <p class="mr-stats">30 min | Medium</p>
                </div>

                <div class="mr-card">
                    <img src="./Images/card-template.jpg" alt="">
                    <h4>The Classic hamburger</h4>
                    <p>A quick and easy hamburger recipe that defintely took longer</p>
                    <p class="mr-stats">30 min | Medium</p>
                </div>

                <div class="mr-card">
                    <img src="./Images/card-template.jpg" alt="">
                    <h4>The Classic hamburger</h4>
                    <p>A quick and easy hamburger recipe that defintely took longer</p>
                    <p class="mr-stats">30 min | Medium</p>
                </div>
            </div>
        </div>

        <div class="create-recipe">
            <div class="cr-left">
            <i class="fa-solid fa-plus"></i>
            <div class="tekst-create">
                <h3>Create new recipe</h3>
                <p>Share your favorite (or experimental) recipe with the community</p>
            </div>
            </div>
            <a class="add-btn" href="">Add Recipe</a>
        </div>

        <div class="saved-recipes">
            Saved recipes
        </div>
    </div>
</div>

<footer>

    <div class="Footer_logo">

        <img src="../Images/Logo.png"
             alt=""
             width="100px">

    </div>


    <div class="nav-footer">

        <a href="">Home</a>
        <a href="">Recipes</a>
        <a href="">Community</a>

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