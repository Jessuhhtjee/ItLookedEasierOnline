const filters = document.querySelector(".recipes-filters");
const grid = document.querySelector(".recipes-grid");
const resultsHeader = document.querySelector(".recipes-results-header h2");
const searchInput = document.querySelector(".recipes-search input");
const clearButton = document.querySelector(".clear-filters");
const emptyFilterMessage = document.querySelector(".recipes-empty-filter");

if (filters && grid) {
    const cards = Array.from(grid.querySelectorAll(".PR_card"));

    function selectedValues(name) {
        return Array.from(filters.querySelectorAll(`input[name="${name}"]:checked`))
            .map((input) => input.value)
            .filter((value) => value !== "all");
    }

    function matchesGroup(selected, cardValue) {
        if (selected.length === 0) return true;
        return selected.includes(cardValue);
    }

    function applyFilters() {
        const categories = selectedValues("category");
        const prepTimes = selectedValues("prep-time");
        const difficulties = selectedValues("difficulty");
        const dietaries = selectedValues("dietary");
        const query = (searchInput?.value || "").trim().toLowerCase();

        let visibleCount = 0;

        cards.forEach((card) => {
            const category = card.dataset.category || "";
            const prepTime = card.dataset.prepTime || "";
            const difficulty = card.dataset.difficulty || "";
            const dietary = card.dataset.dietary || "";
            const title = (card.dataset.title || "").toLowerCase();
            const description = (card.dataset.description || "").toLowerCase();

            const matchesCategory = matchesGroup(categories, category);
            const matchesPrep = matchesGroup(prepTimes, prepTime);
            const matchesDifficulty = matchesGroup(difficulties, difficulty);
            const matchesDietary = matchesGroup(dietaries, dietary);
            const matchesSearch =
                query === "" ||
                title.includes(query) ||
                description.includes(query);

            const visible =
                matchesCategory &&
                matchesPrep &&
                matchesDifficulty &&
                matchesDietary &&
                matchesSearch;

            card.classList.toggle("is-filtered-out", !visible);
            if (visible) visibleCount += 1;
        });

        if (resultsHeader) {
            resultsHeader.textContent = `${visibleCount} recipe${visibleCount === 1 ? "" : "s"} found`;
        }

        if (emptyFilterMessage) {
            const filtersActive =
                categories.length > 0 ||
                prepTimes.length > 0 ||
                difficulties.length > 0 ||
                dietaries.length > 0 ||
                query !== "";

            emptyFilterMessage.hidden = !(filtersActive && visibleCount === 0);
        }
    }

    filters.addEventListener("change", (event) => {
        const input = event.target;
        if (!(input instanceof HTMLInputElement)) return;

        if (input.name === "category" && input.value === "all" && input.checked) {
            filters.querySelectorAll('input[name="category"]').forEach((checkbox) => {
                if (checkbox.value !== "all") checkbox.checked = false;
            });
        }

        if (input.name === "category" && input.value !== "all" && input.checked) {
            const allBox = filters.querySelector('input[name="category"][value="all"]');
            if (allBox) allBox.checked = false;
        }

        applyFilters();
    });

    searchInput?.addEventListener("input", applyFilters);

    clearButton?.addEventListener("click", () => {
        filters.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
            checkbox.checked = checkbox.value === "all" && checkbox.name === "category";
        });
        if (searchInput) searchInput.value = "";
        applyFilters();
    });

    const params = new URLSearchParams(window.location.search);
    const categoryParam = params.get("category");
    if (categoryParam) {
        const normalized = {
            desserts: "dessert",
            dessert: "dessert",
            diner: "dinner",
            dinner: "dinner",
            quick: "quick&easy",
            "quick-easy": "quick&easy",
            "quick&easy": "quick&easy",
        }[categoryParam] || categoryParam;

        const match = filters.querySelector(`input[name="category"][value="${CSS.escape(normalized)}"]`);
        if (match) {
            match.checked = true;
            const allBox = filters.querySelector('input[name="category"][value="all"]');
            if (allBox) allBox.checked = false;
        }
    }

    const queryParam = params.get("q");
    if (queryParam && searchInput) {
        searchInput.value = queryParam;
    }

    applyFilters();
}
