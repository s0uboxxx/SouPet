<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased">
    <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r ">
        <div class="overflow-y-auto overflow-x-hidden flex-grow bg-gray-100">
            <ul class="flex flex-col py-4 space-y-1 mb-4 mt-28">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-6 py-2 text-black-50 
                    @if (request()->is('dashboard')) bg-gray-700 !text-white 
                    @else hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950 @endif">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>

                    <span class="mx-3 text-base">Dashboard</span>
                </a>

                <button id="dropdown-menu-toggle" class="flex items-center px-6 py-2 text-black">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>
                    <span class="mx-3 text-base">Quản lý</span>
                </button>
                <div id="dropdown-menu" class=" {{ request()->is('manage/*') ? 'block' : 'hidden' }}">
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10
                        {{ request()->is('manage/product')
                            ? 'bg-gray-700 !text-white'
                            : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-product') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý sản phẩm</span>
                    </a>
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10 
                    {   { request()->is('manage/storage')
                        ? 'bg-gray-700 !text-white'
                        : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-storage') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý kho hàng</span>
                    </a>
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10 
                        {{ request()->is('manage/user')
                            ? 'bg-gray-700 !text-white'
                            : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-user') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý người dùng</span>
                    </a>
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10 
                        {{ request()->is('manage/brand')
                            ? 'bg-gray-700 !text-white'
                            : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-brand') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý thương hiệu</span>
                    </a>
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10 
                        {{ request()->is('manage/category')
                            ? 'bg-gray-700 !text-white'
                            : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-category') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý phân loại</span>
                    </a>
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10 
                        {{ request()->is('manage/order')
                            ? 'bg-gray-700 !text-white'
                            : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-order') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý đơn hàng</span>
                    </a>
                    <a class="flex items-center px-6 py-2 text-black-50 !pl-10 
                        {{ request()->is('manage/slider')
                        ? 'bg-gray-700 !text-white'
                        : 'hover:bg-gray-700 hover:bg-opacity-25 hover:!text-gray-950' }}"
                        href="{{ route('manage-slider') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="mx-3 text-sm">Quản lý bảng tin</span>
                    </a>
                </div>
            </ul>
        </div>
    </div>
</div>

{{-- @section('styles')
    <link rel="stylesheet" href="{{ asset('build/assets/style-ss.css') }}">
{{-- @endsection --}}
