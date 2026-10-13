<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add recipe | ItLookedEasierOnline</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../css/add_recipe.css">
    <script src="../js/add_recipe.js" defer></script>
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
            <a href="views/recipes_view.php">Recipes</a>
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



<section class="create">
    <div class="create-header">
        <h1>Add a New Recipe</h1>
        <p>Share your favorite recipe with the community.</p>
    </div>

    <form class="create-form">
        <div class="create-column">

            <div class="create-card">
                <h2>Basic Information</h2>

                <div class="form-group">
                    <label for="recipe-title">Recipe Title</label>
                    <input type="text" id="recipe-title" name="title" placeholder="E.g. The Perfect Pancakes" required>
                </div>

                <div class="form-group">
                    <label for="recipe-description">Short Description</label>
                    <textarea id="recipe-description" name="description" maxlength="200" placeholder="A short and tasty description of your recipe..." rows="4"></textarea>
                    <span class="character-count">0/200</span>
                </div>

                <div class="form-grid-3">
                    <div class="form-group">
                        <label for="prep-time">Prep Time</label>
                        <select id="prep-time" name="prepTime">
                            <option value="">Select prep time</option>
                            <option value="under-15">Under 15 minutes</option>
                            <option value="15-30">15 - 30 Minutes</option>
                            <option value="30-60">30 - 60 minutes</option>
                            <option value="over-60">Over 1 hour</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="difficulty">Difficulty</label>
                        <select id="difficulty" name="difficulty">
                            <option value="easy">Easy</option>
                            <option value="">Select difficulty</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                            <option value="apparentlyimpossible">Apparently Impossible</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="servings">Servings</label>
                        <input type="number" id="servings" name="servings" min="1" placeholder="E.g. 2 servings">
                    </div>

                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select id="categories" name="categories">
                            <option value="">Select category</option>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                            <option value="dessert">Dessert</option>
                            <option value="snacks">Snacks</option>
                            <option value="vegetarian">Vegetarian</option>
                            <option value="quick&easy">Quick & Easy</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dietary">Dietary Preferences</label>
                        <select id="dietary" name="dietary">
                            <option value="">Select preference</option>
                            <option value="vegetarian">Vegetarian</option>
                            <option value="vegan">Vegan</option>
                            <option value="gluten-free">Gluten-free</option>
                            <option value="dairy-free">Dairy-free</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="create-card">
                <h2>Ingredients</h2>
                <p>Add all ingredients with the correct amounts.</p>

                <div class="ingredients-heading">
                    <span>Ingredient</span>
                    <span>Amount</span>
                    <span></span>
                </div>

                <div id="ingredients-list">
                    <div class="ingredient-row">
                        <input type="text" name="ingredient[]" placeholder="E.g. Pasta" required>
                        <input type="text" name="amount[]" placeholder="E.g. 200 grams" required>
                        <button type="button" class="remove-btn" aria-label="Remove ingredient">&times;</button>
                    </div>

                    <div class="ingredient-row">
                        <input type="text" name="ingredient[]" placeholder="E.g. Tomato sauce">
                        <input type="text" name="amount[]" placeholder="E.g. 1 cup">
                        <button type="button" class="remove-btn" aria-label="Remove ingredient">&times;</button>
                    </div>

                    <div class="ingredient-row">
                        <input type="text" name="ingredient[]" placeholder="E.g. Mozzarella">
                        <input type="text" name="amount[]" placeholder="E.g. 100 grams">
                        <button type="button" class="remove-btn" aria-label="Remove ingredient">&times;</button>
                    </div>
                </div>

                <button type="button" id="add-ingredient" class="add-btn">
                    + Add Ingredient
                </button>
            </div>

        </div>

        <div class="create-column">

            <div class="create-card">
                <h2>Recipe Image</h2>
                <p>Add a photo of your finished dish. A clear, well-lit photo works best.</p>

                <label for="recipe-image" class="upload-area">
          <span id="upload-text">
            Drag and drop an image here<br>
            or click to upload
          </span>
                    <img id="image-preview" alt="Recipe image preview" hidden>
                </label>

                <input type="file" id="recipe-image" name="recipeImage" accept="image/jpeg,image/png,image/webp">
                <p>Recommended: at least 1200 × 800 pixels (JPG, PNG)</p>
            </div>

            <div class="create-card">
                <h2>Instructions</h2>
                <p>Write the steps to make your recipe. You can add multiple steps.</p>

                <div id="steps-list">
                    <div class="step-row">
                        <span class="step-number">1</span>
                        <textarea name="steps[]" placeholder="Describe the first step..." rows="2" required></textarea>
                        <button type="button" class="remove-btn" aria-label="Remove step">&times;</button>
                    </div>

                    <div class="step-row">
                        <span class="step-number">2</span>
                        <textarea name="steps[]" placeholder="Describe the second step..." rows="2" required></textarea>
                        <button type="button" class="remove-btn" aria-label="Remove step">&times;</button>
                    </div>

                    <div class="step-row">
                        <span class="step-number">3</span>
                        <textarea name="steps[]" placeholder="Describe the third step..." rows="2"></textarea>
                        <button type="button" class="remove-btn" aria-label="Remove step">&times;</button>
                    </div>
                </div>

                <button type="button" id="add-step" class="add-btn">
                    + Add Step
                </button>
            </div>

        </div>

        <div class="create-footer">
            <button type="submit" class="publish-btn">Publish Recipe</button>
        </div>
    </form>
</section>



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
