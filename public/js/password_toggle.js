function togglePasswordAttribute(element) {
    let attrValue = element.getAttribute("type");
    if (attrValue === "password") {
        element.setAttribute("type", "text");
    } else {
        element.setAttribute("type", "password");
    }
}

function toggleEyeIcon(element) {
    if (element.classList.contains("fa-eye")) {
        element.classList.remove("fa-eye");
        element.classList.add("fa-eye-slash")
    } else {
        element.classList.remove("fa-eye-slash");
        element.classList.add("fa-eye")
    }
}