const prodEntitiesSection = document.querySelector(".production-entities-grid");
const prodEntityTemplate = document.querySelector("template#production-entity");
const userActivitySection = document.querySelector(".user-activity-grid");
const userActivityItemTemplate = document.querySelector("template#user-activity-item");
const recommendationsSection = document.querySelector(".recommendation-grid");
const recommendationGridItemTemplate = document.querySelector("template#recommendation-grid-item");

placeProductionEntities();
placeUserActivityItems();
placeRecommendedItems();

async function placeProductionEntities() {
    placeLoader(prodEntitiesSection);
    const productionId = location.pathname.split("/").at(-1);
    const data = {
        productionId: productionId
    };
    const result = await fetchFromEndpointWithData("/getProductionEntities", data);

    console.log(result);

    prodEntitiesSection.innerHTML = "";
    result.directors.forEach((item) => {
        prodEntitiesSection.appendChild(generateProductionEntity("director", item));
    })
    result.studios.forEach((item) => {
        prodEntitiesSection.appendChild(generateProductionEntity("studio", item));
    })
    result.characters.forEach((item) => {
        prodEntitiesSection.appendChild(generateProductionEntity("character", item));
    })
}

function generateProductionEntity(type, item) {
    const clone = prodEntityTemplate.content.cloneNode(true);

    const favorite = clone.querySelector(".entity__favorite");
    favorite?.setAttribute("data-id", item.id);
    favorite?.setAttribute("data-type", type);
    favorite?.setAttribute("data-selected", item.selected === 1);
    favorite?.addEventListener("click", async () => {
        const data = {
            entityId: item.id
        }
        const endpoint = item.selected === 1 ? "/removeEntityAsFavorite" : "/markEntityAsFavorite";
        const result = await fetchFromEndpointWithData(endpoint, data);
        placeProductionEntities();
    });
    clone.querySelector(".entity__img").src = "/public/img/" + item.image_src;
    clone.querySelector(".entity__name").innerHTML = item.name;
    clone.querySelector(".entity__type").innerHTML = type;

    return clone;
}

async function placeUserActivityItems() {
    placeLoader(userActivitySection);
    const productionId = location.pathname.split("/").at(-1);
    const data = {
        productionId: productionId
    };
    const result = await fetchFromEndpointWithData("/getOtherReviewsOnProduction", data);

    userActivitySection.innerHTML = "";
    result.forEach((item) => {
        userActivitySection.appendChild(generateUserActivityItem(item));
    });
}

function generateUserActivityItem(item) {
    const clone = userActivityItemTemplate.content.cloneNode(true);

    clone.querySelector(".user-profile").src = "/public/img/" + item.user_image;
    clone.querySelector(".user-name").innerHTML = item.username;
    clone.querySelector("a").href = "/profile/" + item.id_user;
    clone.querySelector(".item-stats__stars-count").innerHTML = item.mark;
    clone.querySelector(".item-stats__heart").setAttribute("data-selected", item.heart);
    clone.querySelector(".user-review").innerHTML = item.review;

    return clone;
}

async function placeRecommendedItems() {
    placeLoader(recommendationsSection);
    const productionId = location.pathname.split("/").at(-1);
    const data = {
        productionId: productionId
    };
    const result = await fetchFromEndpointWithData("/getRecommendations", data);

    recommendationsSection.innerHTML = "";
    result.forEach((item) => {
        recommendationsSection.appendChild(generateRecommendedItem(item));
    });
}

function generateRecommendedItem(item) {
    const clone = recommendationGridItemTemplate.content.cloneNode(true);

    clone.querySelector("a").href = "/production/" + item.id;
    clone.querySelector(".recommendation-grid-item__poster").src = "/public/img/" + (item.image_src ?? "posters/default.jpg");
    clone.querySelector(".recommendation-item-details__title").innerHTML = item.title;
    clone.querySelector(".item-details__item-type").classList.add("color-" + item.type);
    clone.querySelector(".item-details__item-type").innerHTML = item.type;
    clone.querySelector(".item-stats__stars-count").innerHTML = item.mark;
    clone.querySelector(".item-stats__hearts-count").innerHTML = item.hearts;

    return clone;
}
