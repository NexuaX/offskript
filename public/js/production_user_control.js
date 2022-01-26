const starIcon = document.querySelector("i.user-panel__star");
const heartIcon = document.querySelector("i.user-panel__heart");
const markPanel = document.querySelector("span.user-panel__stars-control");
const markButtons = Array.from(markPanel?.children ?? []);

const saveButton = document.querySelector(".user-panel__button[data-role=save]");
const deleteButton = document.querySelector(".user-panel__button[data-role=delete]");
const addButton = document.querySelector(".user-panel__button[data-role=add]");
const planButton = document.querySelector(".user-panel__button[data-role=plan]");
const noPlanButton = document.querySelector(".user-panel__button[data-role=no-plan]");

const markIndicator = document.querySelector("span.user-panel__stars-count");
const reviewArea = document.querySelector("textarea.user-panel__review-area");
const productionId = location.pathname.split("/").at(-1);

starIcon?.addEventListener("click", () => {
    let visible = markPanel.getAttribute("data-visible");
    if (visible === "true") {
        markPanel.setAttribute("data-visible", "false");
    } else {
        markPanel.setAttribute("data-visible", "true");
    }
});

heartIcon?.addEventListener("click", () => {
    let selected = heartIcon.getAttribute("data-selected");
    if (selected === "true") {
        heartIcon.setAttribute("data-selected", "false");
    } else {
        heartIcon.setAttribute("data-selected", "true");
    }
});

markButtons?.forEach(element => {
   element.addEventListener("click", () => {
       let selected = element.getAttribute("data-selected");
       if (selected === "false") {
           let anotherSelected = document.querySelector("span.stars-control__number[data-selected=true]");
           if (anotherSelected) {
               anotherSelected.setAttribute("data-selected", "false");
           }
           element.setAttribute("data-selected", "true");

           markIndicator.innerHTML = element.getAttribute("data-value");
       }
   });
});

saveButton?.addEventListener("click", () => {
    const data = {
        productionId: productionId,
        mark: markIndicator.innerHTML,
        heart: heartIcon.getAttribute("data-selected") === "true",
        review: reviewArea.value
    };

    fetchThenReload("/addUserReview", data);
});

addButton?.addEventListener("click", () => {
    const data = {
        productionId: productionId,
        isPlanned: false
    };

    fetchThenReload("/addToWatchList", data);
});

planButton?.addEventListener("click", () => {
    const data = {
        productionId: productionId,
        isPlanned: true
    };

    fetchThenReload("/addToWatchList", data);
});

deleteButton?.addEventListener("click", () => {
    const data = {
        productionId: productionId
    };

    fetchThenReload("/removeFromUserWatchList", data);
});

noPlanButton?.addEventListener("click", () => {
    const data = {
        productionId: productionId
    };

    fetchThenReload("/removeFromUserWatchList", data);
});

function fetchThenReload(endpoint, data) {
    fetch(endpoint, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(() => {
        setTimeout(() => {
            location.reload();
        }, 2000);
    });
}
