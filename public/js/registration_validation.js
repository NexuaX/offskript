let registrationForm = document.querySelector("form");
let messagesDiv = document.querySelector("div.messages");
let passwordInput = document.querySelector("input[name=\"password\"]")
let confirmPasswordInput = document.querySelector("input[name=\"confirm_password\"]")

registrationForm.addEventListener("submit", (event) => {
    messagesDiv.innerHTML = "";
    console.log(passwordInput.value);
    console.log(confirmPasswordInput.value);
    console.log(passwordInput.value !== confirmPasswordInput.value);
    if (passwordInput.value !== confirmPasswordInput.value) {
        event.preventDefault();
        confirmPasswordInput.setCustomValidity("Passwords don't match!");
        confirmPasswordInput.reportValidity();
    }
});

confirmPasswordInput.addEventListener("input", () => {
    confirmPasswordInput.setCustomValidity("");
});
passwordInput.addEventListener("input", () => {
    confirmPasswordInput.setCustomValidity("");
});

let passwordShowButton = document.querySelector("input[name=\"password\"] + .show-password-button");
let confirmPasswordShowButton = document.querySelector("input[name=\"confirm_password\"] + .show-password-button");

passwordShowButton.addEventListener("click", () => {
    togglePasswordAttribute(passwordInput);
    toggleEyeIcon(passwordShowButton);
});
confirmPasswordShowButton.addEventListener("click", () => {
    togglePasswordAttribute(confirmPasswordInput);
    toggleEyeIcon(confirmPasswordShowButton);
});
