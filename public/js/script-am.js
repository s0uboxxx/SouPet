const modalForm = document.getElementById("modal-form");
const urlForm = document.getElementById("url-form");
let imagePreview;

function showForm(id, values, title, actionText, url) {
    const btnName = document.getElementById("btn-submit");
    const titleForm = document.getElementById("title-form");

    const idCategoryArray = values?.id_category?.split(",")?.map(Number) || [];

    if (idCategoryArray?.length) {
        idCategoryArray.splice(idCategoryArray.indexOf(0), 1);

        idCategoryArray.forEach((categoryId) => {
            const checkbox = document.getElementById(categoryId);
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    }

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

        const email = document.getElementById("email");
        if (email) {
            email.disabled = true;
        }

        const image = document.getElementById("image");
        if (image) {
            image.removeAttribute("required");
        }
        if (values.image) {
            imagePreview = document.getElementById("image-preview");
            if (imagePreview) {
                imagePreview.src = values.image;
            }
        }

        const password = document.getElementById("password");
        if (password) {
            password.disabled = true;
            password.hidden = true;
        }
        const idStatus = document.getElementById("id_status");
        if (idStatus) {
            idStatus.hidden = false;
        }

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

    if (document.getElementById("id_status")) {
        const idStatus = document.getElementById("id_status");
        idStatus.hidden = true;
    }

    const email = document.getElementById("email");
    if (email) {
        email.disabled = false;
    }

    const image = document.getElementById("image");
    if (image) {
        image.required = true;
    }
}
