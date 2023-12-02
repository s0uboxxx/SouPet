<div id="modal-form" class="fixed inset-0 z-50 flex justify-center overflow-x-hidden overflow-y-scroll hidden mt-32">
    <div class="bg-black opacity-50 absolute inset-0 h-screen"></div>
    <div class="w-full rounded-lg z-50 max-w-6xl h-screen">
        <div class="bg-white rounded-lg p-8">
            <h2 id="title-form" class="text-2xl font-bold mb-4"></h2>
            <form id="url-form" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="id_status" name="id_status" value="1">
                <div class="grid grid-cols-3 gap-2">
                    <input type="text" name="name" id="name"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập họ và tên" required />
                    <input type="date" name="dob" id="dob" max="{{ date('Y-m-d', strtotime('-18 year')) }}"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                    <select name="gender" id="gender" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                        <option value="" selected>Chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <input type="text" name="phone" id="phone"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" pattern="^0?[0-9]{9}$"
                        title="VD: 0123456789 - 10 số và bắt đầu bằng 0"
                        placeholder="Vui lòng nhập đúng số điện thoại" />
                    <input type="text" name="address" id="address"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập địa chỉ" />
                    <input type="email" name="email" id="email"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập email" required />
                    <input type="password" name="password" id="password"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập mật khẩu" required />
                    <select name="id_role" id="id_role" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                        required>
                        <option value="">Chọn vai trò</option>
                        <option value="3">Khách hàng</option>
                        <option value="2">Nhân viên</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <img id="image-preview" class="w-48 h-48 border-4 border-white rounded-full m-auto">
                <input type="file" id="image" class="h-10 mt-1 rounded w-full bg-gray-50" name="avatar"
                    onchange="previewImage(this)">

                <div class="flex justify-end mt-2">
                    <a class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors
                                    duration-150 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:bg-gray-300 cursor-pointer"
                        onclick="closeForm()">
                        Hủy
                    </a>
                    <button id="btn-submit" type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors
                                          duration-150 rounded-lg sm:px-4 sm:py-2 sm:w-auto bg-green-600 hover:bg-green-700">

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
