const search = document.getElementsByClassName("nav-search")[0];
const boxSearch = document.getElementsByClassName("c-header-search")[0];
const inputSearch = document.getElementsByClassName("inputSearch")[0];
const searchClear = document.getElementsByClassName("searchClear")[0];
const lMain = document.getElementsByClassName("l-main")[0];
const searchClose = document.getElementsByClassName("boxSearchClose")[0];

search.addEventListener("click", function () {
    // add class active and remove class display-none
    boxSearch.classList.add("active");
    lMain.classList.add("disabled");
});

searchClose.addEventListener("click", function () {
    console.log(1);
    // remove class active and add class display-none
    boxSearch.classList.remove("active");
    lMain.classList.remove("disabled");
    inputSearch.value = "";
    searchClear.classList.remove("d-block");
    searchClear.classList.add("d-none");
});

inputSearch.addEventListener("input", function () {
    if (inputSearch.value === "") {
        searchClear.classList.remove("d-block");
        searchClear.classList.add("d-none");
    } else {
        searchClear.classList.remove("d-none");
        searchClear.classList.add("d-block");
    }
});
