<div id="modal-form" class="fixed inset-0 z-50 flex justify-center overflow-x-hidden overflow-y-scroll hidden mt-32">
    <div class="bg-black opacity-50 absolute inset-0 h-screen"></div>
    <div class="w-full rounded-lg z-50 max-w-md h-screen">
        <div class="bg-white rounded-lg p-8">
            <h2 id="title-form" class="text-2xl font-bold mb-4"></h2>
            <form id="url-form" method="POST" action="">
                @csrf
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="quantity" name="quantity">
                <input type="number" name="quantityAdd" id="quantityAdd" value="1" min="1"
                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                    title="Nhập số lượng hàng cần bổ sung. Thấp nhất là 1." required>
                <div class="flex justify-end mt-2">
                    <a
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors
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