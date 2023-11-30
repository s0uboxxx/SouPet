document.addEventListener("DOMContentLoaded", function () {
    const btnShow = document.getElementById("dropdown-menu-toggle");

    btnShow.addEventListener("click", function (e) {
        e.preventDefault();
        const menu = document.getElementById("dropdown-menu");
        const isActive = e.target.classList.toggle("active");
        menu.style.display = isActive ? "block" : "none";
    });
});