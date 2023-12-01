<div id="modal-form" class="fixed inset-0 z-50 flex justify-center overflow-x-hidden overflow-y-scroll hidden mt-32">
    <div class="bg-black opacity-50 absolute inset-0 h-screen"></div>
    <div class="w-full rounded-lg z-50 max-w-6xl max-h-64">
        <div class="bg-white rounded-lg p-8">
            <h2 id="title-form" class="text-2xl font-bold mb-4"></h2>

            <form id="url-form" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id">
                <div class="grid grid-cols-3 gap-2">
                    <input type="text" name="name" id="name"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập tên sản phẩm"
                        required />
                    <input type="number" name="weight" id="weight" min="100"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập khối lượng"
                        required />
                    <input type="number" name="price" id="price" min="10000"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập giá" required />
                    <input type="text" name="description" id="description"
                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Nhập mô tả" required />
                    <select name="id_brand" id="id_brand" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                        required>
                        <option value="" selected>Chọn thương hiệu</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-base font-bold my-2">Chọn phân loại</div>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($categoryF as $category)
                        <div>
                            <input type="radio" name="id_category[]" value="{{ $category->id }}"
                                id="{{ $category->name }}" class="peer hidden [&:checked_+_label_svg]:block" required />

                            <label for="{{ $category->name }}"
                                class="flex cursor-pointer items-center justify-between rounded-lg border border-gray-100 bg-white p-3
                                    text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 
                                    peer-checked:ring-blue-500">
                                <div class="flex items-center gap-2">
                                    <svg class="hidden h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <p class="text-gray-700">{{ $category->name }}</p>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div
                    class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 
                    rounded-lg mt-1 grid grid-cols-2">
                    @foreach ($categories as $category)
                        <div class="w-full border-b border-gray-200 rounded-t-lg">
                            <div class="flex items-center ps-3">
                                <input id="{{ $category->name }}" type="checkbox" value="{{ $category->id }}" name ="id_category[]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-20">
                                <label for="{{ $category->name }}"
                                    class="w-full py-2 ms-2 text-sm font-medium text-gray-900">{{ $category->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <img id="image-preview" class="w-96 h-48 border-4 border-white mt-1">
                <input type="file" id="image" class="h-10 mt-1 rounded w-full bg-gray-50" name="image"
                    onchange="previewImage(this)" required>

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
