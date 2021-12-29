
let registrationForm = document.querySelector("form");
let messagesDiv = document.querySelector("div.messages");
let passwordInput = document.querySelector("input[name=\"password\"]")
let confirmPasswordInput = document.querySelector("input[name=\"confirm_password\"]")

registrationForm.addEventListener("submit", (event) => {
    messagesDiv.innerHTML = "";
    if (passwordInput.value !== confirmPasswordInput.value) {
        event.preventDefault();
        confirmPasswordInput.setCustomValidity("Passwords don't match!");
    } else {
        confirmPasswordInput.setCustomValidity("");
    }
});

let passwordShowButton = document.querySelector("input[name=\"password\"] + .show-password-button");
let confirmPasswordShowButton = document.querySelector("input[name=\"confirm_password\"] + .show-password-button");

passwordShowButton.addEventListener("click", () => {
    togglePasswordAttribute(passwordInput);
});
confirmPasswordShowButton.addEventListener("click", () => {
    togglePasswordAttribute(confirmPasswordInput);
});

function togglePasswordAttribute(element) {
    let attrValue = element.getAttribute("type");
    if (attrValue === "password") {
        element.setAttribute("type", "text");
    } else {
        element.setAttribute("type", "password");
    }
}