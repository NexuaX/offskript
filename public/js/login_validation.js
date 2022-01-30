let passwordInput = document.querySelector("input[name=\"password\"]");
let passwordShowButton = document.querySelector("input[name=\"password\"] + .show-password-button");

passwordShowButton.addEventListener("click", () => {
    togglePasswordAttribute(passwordInput);
    toggleEyeIcon(passwordShowButton);
});
