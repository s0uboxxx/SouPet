const modalForm = document.getElementById("modal-form");

function showForm(id, values, title, actionText, url) {
    const btnName = document.getElementById("btn-submit");
    const titleForm = document.getElementById("title-form");
    const urlForm = document.getElementById("url-form");

    modalForm.classList.remove("hidden");
    btnName.innerHTML = actionText;
    titleForm.innerHTML = title;
    urlForm.action = url;
    if(actionText === "Sửa") {
        document.getElementById("id").value = id;
        for (const key in values) {
            if (values.hasOwnProperty(key)) {
                const inputField = document.getElementById(key);
                if (inputField) {
                    inputField.value = values[key];
                }
            }
        }
    }
}

function closeForm() {
    modalForm.classList.add("hidden");
}