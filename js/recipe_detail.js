const ingredientChecks = document.querySelectorAll(".ingredient-check");
const progressFill = document.getElementById("ingredients-progress-fill");
const progressText = document.getElementById("ingredients-progress-text");

function updateIngredientProgress() {
    const total = ingredientChecks.length;
    const checked = document.querySelectorAll(".ingredient-check:checked").length;

    if (progressFill) {
        progressFill.style.width = `${total ? (checked / total) * 100 : 0}%`;
    }
    if (progressText) {
        progressText.textContent = `${checked} of ${total} ingredients ready`;
    }
}

ingredientChecks.forEach(check => {
    check.addEventListener("change", updateIngredientProgress);
});

function setSaveButtonState(button, saved) {
    const icon = button.querySelector("i");
    button.classList.toggle("saved", saved);
    icon.classList.toggle("fa-regular", !saved);
    icon.classList.toggle("fa-solid", saved);
    button.setAttribute("aria-pressed", String(saved));
    button.setAttribute("aria-label", saved ? "Remove from saved recipes" : "Save recipe");
}

const saveButton = document.getElementById("save-recipe");

if (saveButton) {
    const recipeId = Number(saveButton.dataset.recipeId || 0);
    const isLoggedIn = saveButton.dataset.loggedIn === "1";

    saveButton.addEventListener("click", async () => {
        if (!isLoggedIn) {
            window.location.href = "./login-register.php";
            return;
        }

        if (!recipeId) return;

        saveButton.disabled = true;

        try {
            const response = await fetch("./wishlist-toggle.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ recipe_id: recipeId }),
            });

            const data = await response.json();

            if (response.status === 401 && data.login) {
                window.location.href = "./login-register.php";
                return;
            }

            if (!response.ok) {
                throw new Error(data.error || "Could not update wishlist.");
            }

            setSaveButtonState(saveButton, Boolean(data.saved));
        } catch (error) {
            console.error(error);
            alert(error.message || "Could not update wishlist.");
        } finally {
            saveButton.disabled = false;
        }
    });
}

updateIngredientProgress();
