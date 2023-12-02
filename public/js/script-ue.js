document.addEventListener("DOMContentLoaded", function () {
    var closeAccountBtn = document.getElementById("closeAccountBtn");
    var openAccountBtn = document.getElementById("openAccountBtn");

    closeAccountBtn.addEventListener("click", function (e) {
        e.preventDefault();
        updateIdStatus(4);
    });

    openAccountBtn.addEventListener("click", function (e) {
        e.preventDefault();
        updateIdStatus(1);
    });
});

function updateIdStatus(id_status) {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    fetch("/edit-profile", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            "Content-type" : "application/json"
        },
        body: JSON.stringify({
            id_status: id_status
        })

    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
        });
}