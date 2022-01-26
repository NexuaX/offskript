const loaderTemplate = document.querySelector("template#loader");

async function fetchFromEndpoint(endpoint) {
    return await fetch(endpoint, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
    }).then(response => response.json());
}

async function fetchFromEndpointWithData(endpoint, data) {
    return await fetch(endpoint, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(response => response.json());
}

function placeLoader(node) {
    const clone = loaderTemplate.content.cloneNode(true);
    node.innerHTML = "";
    node.appendChild(clone);
}