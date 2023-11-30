document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("search-input");
    var suggestions = document.getElementById("suggestions");
    var xhr;

    searchInput.addEventListener("input", function() {
        var query = this.value.trim();

        if (query !== "") {
            if (xhr) {
                xhr.abort();
            }

            xhr = new XMLHttpRequest();
            xhr.open("GET", "/search" + "?query=" + encodeURIComponent(query));
            xhr.onload = function() {
                if (xhr.status === 200) {
                    suggestions.innerHTML = "";
                    var data = JSON.parse(xhr.responseText);

                    if (data.length > 0) {
                        suggestions.style.display = "block";
                        data.forEach(function(product) {
                            var li = document.createElement("li");
                            var a = document.createElement("a");
                            var div = document.createElement("div");
                            var span = document.createElement("span");
                            var img = document.createElement("img");

                            a.href = "/product/" + product.id;
                            div.classList.add("flex", "items-center", "my-0.5");
                            span.classList.add("ml-2");
                            img.classList.add("w-16");

                            span.textContent = product.name;
                            img.src = "http://da.test/images/product/" + product.image;
                            img.alt = product.name;

                            div.appendChild(img);
                            div.appendChild(span);
                            a.appendChild(div);
                            li.appendChild(a);
                            suggestions.appendChild(li);
                        });
                    } else {
                        suggestions.style.display = "none";
                    }
                }
            };
            xhr.send();
        } else {
            suggestions.style.display = "none";
        }
    });
});