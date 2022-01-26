const newsSection = document.querySelector(".news");

placeNews();
placeTopLists();

async function placeNews() {
    placeLoader(newsSection);
    const data = await fetchFromEndpoint("/indexNews");

    const template = document.querySelector("template#news-item");

    newsSection.innerHTML = "";

    data.forEach(item => {
        newsSection.appendChild(generateNewsItem(item, template));
    });
}

function generateNewsItem(item, template) {
    const clone = template.content.cloneNode(true);

    clone.querySelector("img.news-item__image").src = "/public/img/" + (item.image_src ?? "news-images/news_placeholder.jpeg");
    clone.querySelector(".news-item__title").innerHTML = item.title;

    return clone;
}
