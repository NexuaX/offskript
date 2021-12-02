const hamburgerButton = document.querySelector(".nav__hamburger");
const bodyContainer = document.querySelector("body");

hamburgerButton.addEventListener("click", () => {
    const isNavigationVisible = bodyContainer.getAttribute("data-navigation-visible");

    if (isNavigationVisible === "false") {
        bodyContainer.setAttribute("data-navigation-visible", "true")
    } else {
        bodyContainer.setAttribute("data-navigation-visible", "false")
    }
})