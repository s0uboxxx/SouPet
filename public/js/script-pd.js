// let elements = document.querySelectorAll("[data-menu]");
// for (let i = 0; i < elements.length; i++) {
//     let main = elements[i];
//     main.addEventListener("click", function () {
//         let element = main.parentElement.parentElement;
//         let andicators = main.querySelectorAll("svg");
//         let child = element.querySelector("#sect");
//         child.classList.toggle("hidden");
//         andicators[0].classList.toggle("rotate-180");
//     });
// }

function number_format_vnd($price) {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format($price);
}

const input = document.querySelector(".custom-number-input input");
input.min = 1;

function decrement(e) {
    e.preventDefault();
    input.stepDown();
    calculateTotal();
}

function increment(e) {
    e.preventDefault();
    input.stepUp();
    calculateTotal();
}

const decrementButtons = document.querySelectorAll(
    '.custom-number-input button[data-action="decrement"]'
);
const incrementButtons = document.querySelectorAll(
    '.custom-number-input button[data-action="increment"]'
);

function calculateTotal() {
    const quantity = parseInt(input.value, 10);
    const priceElement = document.getElementById("totalPrice");
    const priceData = parseInt(priceElement.dataset.price, 10);
    const totalPrice = quantity * priceData;
    priceElement.innerText = formatPrice(totalPrice);
}

function formatPrice(price) {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(price);
}

input.addEventListener("input", calculateTotal);

decrementButtons.forEach((btn) => {
    btn.addEventListener("click", decrement);
});

incrementButtons.forEach((btn) => {
    btn.addEventListener("click", increment);
});

document.addEventListener("DOMContentLoaded", function () {
    const btnBuy = document.getElementById("buyNow");
    btnBuy.addEventListener("click", function () {
        var productId = btnBuy.getAttribute("data-product-id");
        var storageQuantity = btnBuy.getAttribute("data-storage-quantity");
        var quantity = document.getElementById("quantity").value;

        if (storageQuantity == 0) {
            var url = "/alert?message=Hiện tại sản phẩm này đã hết hàng!";
        } else if (quantity > storageQuantity) {
            var url = "/alert?message=Số lượng sản phẩm trong kho không đủ!";
        } else {
            var urls =
                "/order/o?productId=" + productId + "&quantity=" + quantity;
            window.location.href = urls;
        }

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                window.location.reload();
            }
        };
        xhr.open("GET", url);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.send();
    });
});

// function buyNow(productId, quantity) {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//             window.location.href = url;
//             window.history.pushState({}, "", urlr);
//         }
//     };

//     var url = "/product/" + productId + "/order?quantity=" + quantity;
//     var urlr = "/order";

//     window.history.pushState({}, "", urlr);
//     xhr.open("GET", url);
//     xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
//     xhr.send();
// }
