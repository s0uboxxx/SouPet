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