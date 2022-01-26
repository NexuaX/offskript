const topListsSection = document.querySelector(".top-lists");

async function placeTopLists(endpoint = "/globalTopList") {
    placeLoader(topListsSection);
    const data = await fetchFromEndpoint(endpoint);

    console.log(data);

    const template = document.querySelector("template#top-list");

    topListsSection.innerHTML = "";
    topListsSection.appendChild(generateTopList("TOP MOVIES", data.topMovies, template))
    topListsSection.appendChild(generateTopList("TOP SHOWS", data.topShows, template))
    topListsSection.appendChild(generateTopList("TOP GAMES", data.topGames, template))
    topListsSection.appendChild(generateTopList("TOP ANIMES", data.topAnimes, template))
}

function generateTopList(key, items, template) {
    const clone = template.content.cloneNode(true);

    clone.querySelector(".top-list__title").innerHTML = key;
    const itemTemplate = document.querySelector("template#top-list-item");
    let itemClone;

    items.forEach((item, index) => {
        itemClone = itemTemplate.content.cloneNode(true);
        itemClone.querySelector("a.top-list-link").href = "/production/" + item.id;
        itemClone.querySelector(".top-list__number").innerHTML = "#" + (index + 1);
        itemClone.querySelector(".top-list__data").innerHTML = item.title;
        itemClone.querySelector(".top-list__stars-count").innerHTML = item.mark;

        clone.querySelector(".top-list__body").appendChild(itemClone);
    });

    return clone;
}