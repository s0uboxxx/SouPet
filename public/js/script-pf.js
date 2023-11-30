const selectedCategories = [];
const selectedBrands = [];
let selectedPrice = "default";

document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".checkbox-filter");
    const priceSelect = document.getElementById("range-price");

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", handleCheckboxChange);
    });

    priceSelect.addEventListener("change", handlePriceChange);
});

function handlePriceChange(e) {
    selectedPrice = (e.target.value).toString();

    filterProducts(selectedCategories, selectedBrands, selectedPrice);
}

function filterProducts(selectedCategories, selectedBrands, selectedPrice) {
    var category = window.location.pathname.split("/")[1];
    var categories = selectedCategories.join(",");
    var brands = selectedBrands.join(",");
    let url;

    if (categories === "" && brands === "" && selectedPrice === "default") {
        url = "/" + category + "/clear";
    } else {
        url = "/" + category + "/p";

        if (categories !== "") {
            url += "?categories=" + categories;
        }

        if (brands !== "") {
            if (categories !== "") {
                url += "&brands=" + brands;
            } else {
                url += "?brands=" + brands;
            }
        }

        if (selectedPrice !== "default") {
            if (categories !== "" || brands !== "") {
                url += "&price=" + selectedPrice;
            } else {
                url += "?price=" + selectedPrice;
            }
        }
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.querySelector(".data-products").remove();
            document.querySelector("#data-grid").innerHTML = xhr.responseText;
            page = 2;
            loadMore();
        }
    };

    var urlr = "/" + category;

    window.history.pushState({}, "", urlr);
    xhr.open("GET", url);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
}

function handleCheckboxChange(e) {
    const categoryID = e.target.getAttribute("data-category-id");
    const brandID = e.target.getAttribute("data-brand-id");
    const type = e.target.getAttribute("data-type");

    if (e.target.checked) {
        if (type === "category") {
            selectedCategories.push(categoryID);
        } else if (type === "brand") {
            selectedBrands.push(brandID);
        }
    } else {
        if (type === "category") {
            const index = selectedCategories.indexOf(categoryID);
            if (index > -1) {
                selectedCategories.splice(index, 1);
            }
        } else if (type === "brand") {
            const index = selectedBrands.indexOf(brandID);
            if (index > -1) {
                selectedBrands.splice(index, 1);
            }
        }
    }

    filterProducts(selectedCategories, selectedBrands, selectedPrice);
}
