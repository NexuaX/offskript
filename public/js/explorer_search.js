const explorerSearchBar = document.querySelector("input.search-bar");
const form = document.querySelector("form.search-form");
const explorerSection = document.querySelector(".section--explorer");
const checkboxes = document.querySelectorAll(".filters__checkbox");

const filters = {
    movie: true,
    show: true,
    game: true,
    anime: true
}

printDefault();

checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
        let checkboxValue = checkbox.value;
        filters[checkboxValue] = checkbox.checked;
        if (checkbox.checked) {
            explorerSection.querySelector(".section--" + checkboxValue).style.display = "initial";
        } else {
            explorerSection.querySelector(".section--" + checkboxValue).style.display = "none";
        }
    })
});

form.addEventListener("submit", event => {
    event.preventDefault();
});

explorerSearchBar.addEventListener("keyup", event => {
    if (event.key === "Enter") {
        fetchFromEndpoint(event.target.value);
    }
});

function placeLoader() {
    const loader = document.querySelector("template#loader");
    const clone = loader.content.cloneNode(true);
    explorerSection.innerHTML = "";
    explorerSection.appendChild(clone);
}

function printDefault() {
    fetchFromEndpoint("");
}

function fetchFromEndpoint(searchValue) {
    placeLoader();
    const data = {sentence: searchValue};

    fetch("/explorerSearch", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(response => {
        return response.json();
    }).then(data => {
        explorerSection.innerHTML = "";
        printElements(data);
    });
}

function printElements(data) {
    createSection("Movies", data.movie);
    createSection("Shows", data.show);
    createSection("Games", data.game);
    createSection("Animes", data.anime);
}

function createSection(key, elements) {
    const template = document.querySelector("template#section-template");
    const clone = template.content.cloneNode(true);

    const subKey = key.toLowerCase().slice(0, -1);
    const sectionDiv = clone.querySelector(".section--subsection");
    sectionDiv.classList.add("section--" + subKey);

    if (!filters[subKey]) sectionDiv.style.display = "none";

    const sectionTitle = clone.querySelector(".section__title");
    sectionTitle.innerHTML = key;

    elements.forEach(item => {
        createSectionItem(item, clone);
    });

    explorerSection.appendChild(clone);
}

function createSectionItem(item, node) {
    const template = document.querySelector("template#section-item-template");
    const clone = template.content.cloneNode(true);

    const link = clone.querySelector("a.explorer-grid-item-link");
    link.href = "/production/" + item.id;

    const img = clone.querySelector("img.explorer-grid-item__poster");
    img.src = "/public/img/" + item.image_src ?? "posters/default";

    const title = clone.querySelector(".item-details__title");
    title.innerHTML = item.title;

    const starsCount = clone.querySelector("span.item-stats__stars-count");
    starsCount.innerHTML = item.mark ?? 0;

    const heartsCount = clone.querySelector("span.item-stats__hearts-count");
    heartsCount.innerHTML = item.hearts;

    node.querySelector(".explorer--grid").appendChild(clone);
}