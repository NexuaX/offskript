const userActivitySection = document.querySelector(".user-activity-grid");
const userActivityItemTemplate = document.querySelector("template#user-activity-item");
const randomUsersSection = document.querySelector(".random-users-grid");
const randomUserItemTemplate = document.querySelector("template#random-user-item");
const favoritesSection = document.querySelector(".favorite-grid");
const favoriteItemTemplate = document.querySelector("template#favorite-item");

const lastURLElement = location.pathname.split("/").at(-1);

placeUserActivityItems();
placeRandomUsers();
placeFavoriteEntities();
placeTopLists(lastURLElement === "profile" ? "/getUserTopList" : "/getUserTopList/" + lastURLElement);

async function placeUserActivityItems() {
    placeLoader(userActivitySection);
    const endpoint = lastURLElement === "profile" ? "/getUserReviews" : "/getUserReviews/" + lastURLElement;

    const result = await fetchFromEndpoint(endpoint);
    userActivitySection.innerHTML = "";
    result.forEach((item) => {
        userActivitySection.appendChild(generateUserActivityItem(item));
    });
}

function generateUserActivityItem(item) {
    const clone = userActivityItemTemplate.content.cloneNode(true);

    clone.querySelector(".user-activity-item__poster").src = "/public/img/" + item.image_src;
    clone.querySelector(".item-details__link").href = "production/" + item.id_production;
    clone.querySelector(".item-details__title").innerHTML = item.title;
    clone.querySelector(".item-details__item-type").innerHTML = item.type;
    clone.querySelector(".item-details__item-type").classList.add("color-" + item.type);
    clone.querySelector(".item-stats__stars-count").innerHTML = item.mark;
    clone.querySelector(".item-details__user-review").innerHTML = item.review;

    return clone;
}

async function placeRandomUsers() {
    placeLoader(randomUsersSection);
    const endpoint = lastURLElement === "profile" ? "/getRandomUsers" : "/getRandomUsers/" + lastURLElement;

    const result = await fetchFromEndpoint(endpoint);
    randomUsersSection.innerHTML = "";
    result.forEach((item) => {
        randomUsersSection.appendChild(generateRandomUserItem(item));
    });
}

function generateRandomUserItem(item) {
    const clone = randomUserItemTemplate.content.cloneNode(true);

    clone.querySelector(".random__user-profile").src = "/public/img/" + item.image_src;
    clone.querySelector(".random__user-link").href = "/profile/" + item.id;
    clone.querySelector(".random__user-name").innerHTML = item.username;
    clone.querySelector(".random__stars-count").innerHTML = item.reviews;
    clone.querySelector(".random__followers-count").innerHTML = item.followers;
    clone.querySelector(".random__movies-count").innerHTML = item.movies;
    clone.querySelector(".random__shows-count").innerHTML = item.shows;
    clone.querySelector(".random__games-count").innerHTML = item.games;
    clone.querySelector(".random__animes-count").innerHTML = item.animes;

    return clone;
}

async function placeFavoriteEntities() {
    placeLoader(favoritesSection);
    const endpoint = lastURLElement === "profile" ? "/getUserFavorites" : "/getUserFavorites/" + lastURLElement;

    const result = await fetchFromEndpoint(endpoint);
    favoritesSection.innerHTML = "";
    result.forEach((item) => {
        favoritesSection.appendChild(generateFavoriteItem(item));
    });
}

function generateFavoriteItem(item) {
    const clone = favoriteItemTemplate.content.cloneNode(true);

    clone.querySelector(".favorite-grid-item__poster").src = "/public/img/" + item.image_src;
    clone.querySelector(".favorite-item-details__title").innerHTML = item.name;
    clone.querySelector(".favorite-item-details__description").innerHTML = item.type;

    return clone;
}
