var page;
let btnLoad = document.getElementById("load-more-btn");

document.addEventListener("DOMContentLoaded", function () {
    btnLoad = document.getElementById("load-more-btn");
    page = 2;
    loadMore();
});

const loadMore = () => {
    btnLoad = document.getElementById("load-more-btn");
    btnLoad.addEventListener("click", loadMoreProducts);
};

const loadMoreProducts = (e) => {
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.querySelector("#load-more").remove();

            if (xhr.responseText.trim() !== "") {
                document
                    .querySelector("#data-grid")
                    .insertAdjacentHTML("beforeend", xhr.responseText);
                page++;
                btnLoad = document.getElementById("load-more-btn");
            }

            loadMore();
        }
    };

    var category = window.location.pathname.split("/")[1];
    var categories = selectedCategories.join(",");

    var url = "/" + category + "/more/" + page + "?filter=" + categories;
    var urlr = "/" + category;

    window.history.pushState({}, "", urlr);
    xhr.open("GET", url);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
};