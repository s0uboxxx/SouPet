document.addEventListener("DOMContentLoaded", function () {
    var closeAccountBtn = document.getElementById("closeAccountBtn");

    closeAccountBtn.addEventListener("click", function (e) {
        e.preventDefault();
        updateIdStatus();
    });
});

function updateIdStatus() {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    fetch("/edit-profile", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            "Content-type" : "application/json"
        },
        body: JSON.stringify({
            id_status: 4
        })

    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
        });
}