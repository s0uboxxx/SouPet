<div id="modal-confirm" class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto hidden">
    <div class="bg-black opacity-50 absolute inset-0"></div>

    <div class="bg-white w-full max-w-md p-6 rounded-lg z-50">
        <div class="mb-4">
            <p id="title-modal" class="mb-2 text-lg font-semibold text-gray-700">
            </p>
            <p id="name-modal" class="text-sm text-gray-700">
            </p>
        </div>

        <div class="flex justify-end">
            <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors
                        duration-150 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:bg-gray-300"
                    onclick="closeModal()">
                Hủy
            </button>
            <a id="link" href="/" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors
                              duration-150 rounded-lg sm:px-4 sm:py-2 sm:w-auto bg-red-600 hover:bg-red-700">
                
            </a>
        </div>
    </div>
</div>