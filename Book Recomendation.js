let searchInputEl = document.getElementById("searchInput");
let resultsSearchEl = document.getElementById("searchResults");
let spinnerEl = document.getElementById("spinner");
let errorMessageEl = document.getElementById("errorMessage");

function onCreateAndAppendResults(resultObj) {
    let {
        author,
        imageLink,
        title
    } = resultObj;

    let divContainerEl = document.createElement("div");
    divContainerEl.classList.add("col-6");
    resultsSearchEl.appendChild(divContainerEl);

    let imageBookEl = document.createElement("img");
    imageBookEl.src = imageLink;
    imageBookEl.classList.add("image-shaping");
    divContainerEl.appendChild(imageBookEl);

    let authorNameEl = document.createElement("p");
    authorNameEl.textContent = author;
    authorNameEl.classList.add("author-name");
    divContainerEl.appendChild(authorNameEl);

}

function displayRsults(responseData) {
    resultsSearchEl.textContent = "";
    let headingBookEle = document.createElement("h1");
    headingBookEle.classList.add("books-heading", "mt-2");
    headingBookEle.textContent = "Popular Books";
    resultsSearchEl.appendChild(headingBookEle);

    for (let resultObj of responseData) {
        onCreateAndAppendResults(resultObj);
    }
}

function httpGetRequest(event) {
    if (event.key === "Enter") {
        let userInputValue = event.target.value;
        let url = "https://apis.ccbp.in/book-store?title=" + userInputValue;
        let options = {
            method: "GET"
        }
        spinnerEl.classList.remove("d-none");
        resultsSearchEl.classList.add("d-none");
        fetch(url, options)
            .then(function(response) {
                return response.json();
            })
            .then(function(jsonData) {
                console.log(jsonData);
                let responseData = jsonData.search_results;
                spinnerEl.classList.add("d-none");
                resultsSearchEl.classList.remove("d-none");
                if (responseData.length === 0) {
                    resultsSearchEl.textContent = "";
                    errorMessageEl.textContent = "No Results Found";
                } else {
                    displayRsults(responseData);
                }

            })
    }
}

searchInputEl.addEventListener("keydown", httpGetRequest);