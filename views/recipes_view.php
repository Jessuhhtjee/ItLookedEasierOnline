<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ItLookedEasierOnline_Recipes</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/recipes.css">
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

        <a href="views/login_view.php" id="Login_button">
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


        <div class="recipes-sort">

            <label for="sort">
                Sort by
            </label>

            <select id="sort">
                <option value="popular">
                    Most popular
                </option>

                <option value="newest">
                    Newest
                </option>

                <option value="shortest">
                    Shortest
                </option>

                <option value="longest">
                    Longest
                </option>
            </select>

        </div>

    </section>


    <section class="recipes-content">


        <aside class="recipes-filters">


            <div class="filter-section">

                <h3>
                    Categories
                </h3>

                <label>
                    <input type="checkbox" name="category" value="all">
                    <span>All Recipes</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="breakfast">
                    <span>Breakfast</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="lunch">
                    <span>Lunch</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="dinner">
                    <span>Dinner</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="snacks">
                    <span>Snacks</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="desserts">
                    <span>Desserts</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="vegetarian">
                    <span>Vegetarian</span>
                </label>

                <label>
                    <input type="checkbox" name="category" value="quick">
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
                    <input type="checkbox" name="difficulty" value="impossible">
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
                    128 recipes found
                </h2>

                <div class="view-options">

                    <button type="button" class="grid-view">
                        <i class="fa-solid fa-grip"></i>
                    </button>

                    <button type="button" class="list-view">
                        <i class="fa-solid fa-list"></i>
                    </button>

                </div>

            </div>


            <div class="recipes-grid">

            </div>


            <nav class="recipes-pagination">

                <button type="button">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <button type="button" class="active">
                    1
                </button>

                <button type="button">
                    2
                </button>

                <button type="button">
                    3
                </button>

                <button type="button">
                    4
                </button>

                <button type="button">
                    5
                </button>

                <span>
                    ...
                </span>

                <button type="button">
                    13
                </button>

                <button type="button">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

            </nav>


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
                src="../Images/Logo.png"
                alt=""
                width="100px"
        >

    </div>


    <div class="nav-footer">

        <a href="">
            Home
        </a>

        <a href="">
            Recipes
        </a>

        <a href="">
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
