document.addEventListener("DOMContentLoaded", function () {
    var closeAccountBtn = document.getElementById("closeAccountBtn");

    closeAccountBtn.addEventListener("click", function (e) {
        e.preventDefault();
        updateIdStatus();
    });

    // document.querySelector("form").addEventListener("submit", function (e) {
    //     e.preventDefault();
    //     updateProfile();
    // });
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

function previewAvatar(input) {
    const preview = document.getElementById('avatar-preview');
    const file = input.files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "{{ $user->avatar == null ? asset('images/logo-icon.avif') : asset('images/user/' . $user->avatar)}}";
    }
}

// function updateProfile() {
//     var formData = new FormData(this);

//     formData.append("test", 4);

//     // fetch(this.action, {
//     //     method: "POST",
//     //     headers: {
//     //         'X-CSRF-TOKEN': '{{ csrf_token() }}',
//     //         'Accept': 'application/json',
//     //     },
//     //     body: formData,
//     // })
//     //     .then((response) => response.json())
//     //     .then((data) => {
//     //         console.log(data);
//     //     });
// }

// document.addEventListener("DOMContentLoaded", function () {
//     var input = document.getElementById("address");
//     new Awesomplete(input, {
//         list: [
//             "An Giang",
//             "Bà Rịa - Vũng Tàu",
//             "Bạc Liêu",
//             "Bắc Giang",
//             "Bắc Kạn",
//             "Bắc Ninh",
//             "Bến Tre",
//             "Bình Dương",
//             "Bình Định",
//             "Bình Phước",
//             "Bình Thuận",
//             "Cà Mau",
//             "Cao Bằng",
//             "Cần Thơ",
//             "Đà Nẵng",
//             "Đắk Lắk",
//             "Đắk Nông",
//             "Điện Biên",
//             "Đồng Nai",
//             "Đồng Tháp",
//             "Gia Lai",
//             "Hà Giang",
//             "Hà Nam",
//             "Hà Nội",
//             "Hà Tĩnh",
//             "Hải Dương",
//             "Hải Phòng",
//             "Hậu Giang",
//             "Hòa Bình",
//             "Hưng Yên",
//             "Khánh Hòa",
//             "Kiên Giang",
//             "Kon Tum",
//             "Lai Châu",
//             "Lạng Sơn",
//             "Lào Cai",
//             "Lâm Đồng",
//             "Long An",
//             "Nam Định",
//             "Nghệ An",
//             "Ninh Bình",
//             "Ninh Thuận",
//             "Phú Thọ",
//             "Phú Yên",
//             "Quảng Bình",
//             "Quảng Nam",
//             "Quảng Ngãi",
//             "Quảng Ninh",
//             "Quảng Trị",
//             "Sóc Trăng",
//             "Sơn La",
//             "Tây Ninh",
//             "Thái Bình",
//             "Thái Nguyên",
//             "Thanh Hóa",
//             "Thành phố Hồ Chí Minh",
//             "Thừa Thiên Huế",
//             "Tiền Giang",
//             "Trà Vinh",
//             "Tuyên Quang",
//             "Vĩnh Long",
//             "Vĩnh Phúc",
//             "Yên Bái",
//         ],
//         minChars: 1,
//         autoFirst: true,
//         filter: function (text, input) {
//             return Awesomplete.FILTER_CONTAINS(text, input.match(/[^,]*$/)[0]);
//         },
//         item: function (text, input) {
//             return Awesomplete.ITEM(text, input.match(/[^,]*$/)[0]);
//         },
//     });

//     input.addEventListener("input", function () {
//         var value = this.value;
//         if (possibleValues.indexOf(value) === -1) {
//             this.value = "";
//         }
//     });
// });
