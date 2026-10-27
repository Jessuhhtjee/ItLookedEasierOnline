const createSection = document.querySelector(".create");
const ingredientsList = createSection.querySelector("#ingredients-list");
const stepsList = createSection.querySelector("#steps-list");

// Character counter
const description = createSection.querySelector("#recipe-description");
const characterCount = createSection.querySelector(".character-count");

description.addEventListener("input", () => {
    characterCount.textContent = `${description.value.length}/200`;
});

// Add ingredient
createSection.querySelector("#add-ingredient").addEventListener("click", () => {
    const row = document.createElement("div");
    row.className = "ingredient-row";

    row.innerHTML = `
    <input type="text" name="ingredient[]" placeholder="Ingredient" required>
    <input type="text" name="amount[]" placeholder="Amount" required>
    <button type="button" class="remove-btn" aria-label="Remove ingredient">&times;</button>
  `;

    ingredientsList.appendChild(row);
});

// Add instruction step
createSection.querySelector("#add-step").addEventListener("click", () => {
    const number = stepsList.querySelectorAll(".step-row").length + 1;
    const row = document.createElement("div");
    row.className = "step-row";

    row.innerHTML = `
    <span class="step-number">${number}</span>
    <textarea name="steps[]" placeholder="Describe step ${number}..." rows="2" required></textarea>
    <button type="button" class="remove-btn" aria-label="Remove step">&times;</button>
  `;

    stepsList.appendChild(row);
});

// Remove ingredients and steps
createSection.addEventListener("click", (event) => {
    const button = event.target.closest(".remove-btn");
    if (!button || !createSection.contains(button)) return;

    const row = button.closest(".ingredient-row, .step-row");
    if (!row) return;

    row.remove();
    updateStepNumbers();
});

// Update step numbers
function updateStepNumbers() {
    stepsList.querySelectorAll(".step-row").forEach((row, index) => {
        const number = index + 1;
        row.querySelector(".step-number").textContent = number;
        row.querySelector("textarea").placeholder = `Describe step ${number}...`;
    });
}

// Image upload preview
const imageInput = createSection.querySelector("#recipe-image");
const imagePreview = createSection.querySelector("#image-preview");
const uploadText = createSection.querySelector("#upload-text");

imageInput.addEventListener("change", () => {
    const file = imageInput.files[0];
    if (!file || !file.type.startsWith("image/")) return;

    imagePreview.src = URL.createObjectURL(file);
    imagePreview.hidden = false;
    uploadText.hidden = true;
});

// Drag and drop image
const uploadArea = createSection.querySelector(".upload-area");

uploadArea.addEventListener("dragover", (event) => {
    event.preventDefault();
});

uploadArea.addEventListener("drop", (event) => {
    event.preventDefault();

    const file = event.dataTransfer.files[0];
    if (!file || !file.type.startsWith("image/")) return;

    const transfer = new DataTransfer();
    transfer.items.add(file);
    imageInput.files = transfer.files;
    imageInput.dispatchEvent(new Event("change"));
});
