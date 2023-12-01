const modalForm = document.getElementById("modal-form");
const urlForm = document.getElementById("url-form");
let imagePreview;

function showForm(id, values, title, actionText, url) {
    const btnName = document.getElementById("btn-submit");
    const titleForm = document.getElementById("title-form");

    modalForm.classList.remove("hidden");
    btnName.innerHTML = actionText;
    titleForm.innerHTML = title;
    urlForm.action = url;

    if (actionText === "Bổ sung") {
        document.getElementById("id").value = id;

        for (const key in values) {
            if (values.hasOwnProperty(key)) {
                const inputField = document.getElementById(key);
                inputField.value = values[key];
            }
        }
    }

    if (actionText === "Sửa") {
        document.getElementById("id").value = id;

        if (values.image) {
            imagePreview = document.getElementById("image-preview");
            if (imagePreview) {
                imagePreview.src = values.image;
            }
        }

        const password = document.getElementById("password");
        password.disabled = true;
        password.hidden = true;

        for (const key in values) {
            if (values.hasOwnProperty(key)) {
                const inputField = document.getElementById(key);
                const inputValue = values[key];

                if (inputField) {
                    if (key === "image") {
                        inputField.value = "";
                    } else {
                        inputField.value = inputValue;
                    }
                }
            }
        }
    }
}

function closeForm() {
    modalForm.classList.add("hidden");
    urlForm.reset();
    if (imagePreview) {
        imagePreview.src = "";
    }

    if (document.getElementById("password")) {
        const password = document.getElementById("password");
        password.disabled = false;
        password.hidden = false;
    }
}
