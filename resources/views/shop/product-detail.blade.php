@extends('layouts.app')

@section('title', $product->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style-pd.css') }}">
@endsection

@section('content')

    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden border-solid border-3 border-sky-500">
            <img class="mt-6 w-ful" src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class="border-b border-gray-200 pb-1">
                <p class="text-sm leading-none text-gray-600">{{ $product->brands->name }}</p>
                <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 mt-2">
                    {{ $product->name }}</h1>
                @if (optional($product->productQuantities)->isNotEmpty())
                    <div class="text-sm text-gray-500 mt-1 italic">*Kho:
                        {{ $product->productQuantities->first()->quantity }} sản phẩm
                    </div>
                @endif
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <span class="title-content leading-4 text-gray-800">Số lượng:</span>

                <div class="custom-number-input h-10 w-32">
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                        <button data-action="decrement"
                            class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 
                                    h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        <input type="number"
                            class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold 
                                    text-md hover:text-black focus:text-black md:text-base cursor-default flex items-center 
                                    text-gray-700 outline-none"
                            name="custom-input-number" value="1" id="quantity" />
                        <button data-action="increment"
                            class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 
                                    rounded-r cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <span class="title-content leading-4 text-gray-800">Thành tiền:</span>
                <span id="totalPrice" class="text-base leading-none text-gray-600" data-price="{{ $product->price }}">
                    {{ number_format($product->price, 0, ',', '.') }}₫
                </span>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-center">
                @if (optional($product->productQuantities)->isNotEmpty())
                    <button id="buyNow"
                        data-product-id="{{ $product->id }}"
                        data-storage-quantity="{{ $product->productQuantities->first()->quantity }}"
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 
                    text-white text-sm font-medium rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M12 4L12 6M12 18L12 20M15.5 8C15.1666667 6.66666667 14 6 12 6 9 6 8.5 7.95652174 8.5 9 8.5 13.140327 15.5 10.9649412 15.5 15 15.5 16.0434783 15 18 12 18 10 18 8.83333333 17.3333333 8.5 16">
                            </path>
                        </svg>
                        Mua ngay
                    </button>

                    {{-- <button
                        class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600
                     text-white text-sm font-medium rounded-md"
                        disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M21 5L19 12H7.37671M20 16H8L6 3H3M16 5.5H13.5M13.5 5.5H11M13.5 5.5V8M13.5 5.5V3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Thêm vào giỏ
                    </button> --}}
                @else
                    <span class="text-lg leading-4 text-red-800">Sản phẩm hiện chưa được phân phối!</span>
                @endif
            </div>

            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <span class="leading-4 text-gray-800 title-content">Giới thiệu:
                    <p class="text-base lg:leading-tight leading-normal text-gray-600 mt-2">
                        {!! nl2br($product->description) !!}
                    </p>
                </span>
            </div>
        </div>
    </div>

@endsection

@section('body_scripts')
    <script src="{{ asset('js/script-pd.js') }}" defer></script>
@endsection
