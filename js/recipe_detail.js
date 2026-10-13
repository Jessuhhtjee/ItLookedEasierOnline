const ingredientChecks = document.querySelectorAll(".ingredient-check");
const progressFill = document.getElementById("ingredients-progress-fill");
const progressText = document.getElementById("ingredients-progress-text");

function updateIngredientProgress() {
    const total = ingredientChecks.length;
    const checked = document.querySelectorAll(".ingredient-check:checked").length;

    progressFill.style.width = `${total ? (checked / total) * 100 : 0}%`;
    progressText.textContent = `${checked} of ${total} ingredients ready`;
}

ingredientChecks.forEach(check => {
    check.addEventListener("change", updateIngredientProgress);
});

const saveButton = document.getElementById("save-recipe");

saveButton.addEventListener("click", () => {
    const saved = saveButton.classList.toggle("saved");
    const icon = saveButton.querySelector("i");

    icon.classList.toggle("fa-regular", !saved);
    icon.classList.toggle("fa-solid", saved);

    saveButton.setAttribute("aria-pressed", String(saved));
});

document.getElementById("print-recipe").addEventListener("click", () => {
    window.print();
});

updateIngredientProgress();