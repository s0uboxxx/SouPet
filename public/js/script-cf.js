const modalConfirm = document.getElementById("modal-confirm");
const link = document.getElementById("link");
const titleModal = document.getElementById("title-modal");
const nameModal = document.getElementById("name-modal");

function openModal(url, title, name) {
    modalConfirm.classList.remove("hidden");
    link.href = url;
    link.innerHTML = title;
    titleModal.innerHTML = title;
    var titleText = title.toLowerCase();
    nameModal.innerHTML =
        
        "Bạn có chắc chắn muốn " + titleText + " " + "<b>" + name + "</b>" + " không?";
}

function closeModal() {
    modalConfirm.classList.add("hidden");
}