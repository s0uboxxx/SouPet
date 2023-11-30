@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <div class="flex">
        <div class="w-1/6 p-4">
            @include('shop.sidebar')
        </div>
        <div class="w-5/6 p-4">
            <div class="container mx-auto my-8">
                <div id="data-grid">
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6 data-products">
                        @forelse ($products as $index => $product)
                            <a href="{{ url('/product/' . $product->id) }}">
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden bg-white">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover bg-product-sz bg-center"
                                        style="background-image: url('{{ asset('images/product/' . $product->image) }}')">
                                        <button
                                            class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase h-9 text-sm">{{ $product->name }}</h3>
                                        <span class="text-gray-500 mt-2">
                                            {{ number_format($product->price, 0, ',', '.') }}₫
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p>Không có sản phẩm.</p>
                        @endforelse
                    </div>
                    @if ($hasMorePage)
                        <div id="load-more" class="mt-4 text-center">
                            <button id="load-more-btn"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md focus:outline-none">
                                Xem thêm
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection