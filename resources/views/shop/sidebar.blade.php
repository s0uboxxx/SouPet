<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased">
    <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
        <div class="overflow-y-auto overflow-x-hidden flex-grow bg-gray-100">
            <ul class="flex flex-col py-4 space-y-1 mb-4 mt-28">
                <li class="px-5-c">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-gray-900 text-base">Mức giá</div>
                    </div>
                </li>
                <li>
                    <div class="flex items-center justify-center">
                        <select id="range-price" name="range-price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full
                                    focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                            <option value="default">Chọn mức giá</option>
                            <option value="min">Từ thấp đến cao</option>
                            <option value="max">Từ cao đến thấp</option>
                        </select>
                    </div>
                </li>

                <li class="px-5-c">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-gray-900 text-base">Danh mục</div>
                    </div>
                </li>
                @foreach ($categories as $category)
                    <li class="pl-4">
                        <div class="inline-flex items-center">
                            <label class="relative flex cursor-pointer items-center rounded-full p-2 checkbox-filter">
                                <input type="checkbox"
                                    class="before:content[''] peer relative h-4 w-4 cursor-pointer appearance-none rounded-md border 
                                        border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block 
                                        before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 
                                        checked:bg-green-500 checked:before:bg-green-500 hover:before:opacity-10"
                                    data-category-id="{{ $category->id }}" data-type="category"
                                    {{ request()->get('filter') == $category->id ? 'checked' : null }}>
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                        fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </label>
                            <span class="text-sm font-medium text-gray-700">{{ $category->name }}
                                @if (request()->is('food'))
                                    ({{ $category->productsWithFood->count() }})
                                @elseif (request()->is('toy'))
                                    ({{ $category->productsWithToy->count() }})
                                @endif
                            </span>
                        </div>
                    </li>
                @endforeach

                <li class="px-5-c">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-gray-900 text-base">Thương hiệu</div>
                    </div>
                </li>
                @foreach ($brands as $brand)
                    <li class="pl-4">
                        <div class="inline-flex items-center">
                            <label class="relative flex cursor-pointer items-center rounded-full p-2 checkbox-filter">
                                <input type="checkbox"
                                    class="before:content[''] peer relative h-4 w-4 cursor-pointer appearance-none rounded-md border 
                                        border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 
                                        before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 
                                        before:opacity-0 before:transition-opacity checked:border-indigo-500 checked:bg-indigo-500 
                                        checked:before:bg-indigo-500 hover:before:opacity-10"
                                    data-brand-id="{{ $brand->id }}" data-type="brand"
                                    {{ request()->get('filter') == $brand->id ? 'checked' : null }}>
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                        fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </label>
                            <span class="text-sm font-medium text-gray-700">{{ $brand->name }}
                                @if (request()->is('food'))
                                    ({{ $brand->productsWithFood->count() }})
                                @elseif (request()->is('toy'))
                                    ({{ $brand->productsWithToy->count() }})
                                @endif
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@section('body_scripts')
    <script src="{{ asset('js/script-pl.js') }}" defer></script>
    <script src="{{ asset('js/script-pf.js') }}" defer></script>
@endsection


{{-- <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                    </a>
                </li> --}}

{{-- <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                        <span
                            class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                    </a>
                </li>
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Tasks</div>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Available Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Clients</span>
                        <span
                            class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-500 bg-green-50 rounded-full">15</span>
                    </a>
                </li>
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                    </a>
                </li> --}}
