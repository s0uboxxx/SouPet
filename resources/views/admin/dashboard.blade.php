@extends('admin.layouts.index')

@section('title', 'Bảng điều khiển')

@section('admin-head-scripts')
    <script src="{{ @asset('vendor/larapex-charts/apexcharts.js') }}"></script>
@endsection

@section('admin-content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
        <div
            class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 
                border-blue-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $customers->count() }}</p>
                <p>Số lượng khách hàng</p>
            </div>
        </div>
        <div
            class="bg-blue-500 hadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $orders->count() }}</p>
                <p>Số đơn đặt hàng</p>
            </div>
        </div>
        <div
            class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $orders->where('status_id', 3)->sum('quantity') }}</p>
                <p>Số lượng sản phẩm đã bán</p>
            </div>
        </div>
        <div
            class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ number_format($orders->where('status_id', 3)->sum('total'), 0, ',', '.') }}₫</p>
                <p>Tổng doanh thu</p>
            </div>
        </div>
    </div>

    <div class="max-w-full w-full bg-white rounded-lg shadow p-4 md:p-6">
        <div class="flex justify-between">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">Doanh thu</h5>
                <p class="text-base font-normal text-gray-500">3 tháng gần nhất ({{ date('Y') }})</p>
            </div>
        </div>
        <div class="bg-white shadow-lg p-4" id="chartline"></div>
    </div>

    <div class="col-span-12 mt-5 grid gap-2">
        <div class="leading-none text-3xl font-bold text-gray-900">
            Tổng số sản phẩm
        </div>
    
        <div class="grid grid-cols-2 gap-3">
            <div class="bg-white rounded-lg shadow p-4 md:p-6 flex flex-col justify-between col-span-1">
                <p class="text-base font-normal text-gray-500 pb-1">Thương hiệu</p>
                <div class="bg-white shadow-lg h-64" id="chartpieBrand"></div>
            </div>
        
            <div class="bg-white rounded-lg shadow p-4 md:p-6 flex flex-col justify-between col-span-1">
                <p class="text-base font-normal text-gray-500 pb-1">Danh mục</p>
                <div class="bg-white shadow-lg h-64" id="chartpieCategory"></div>
            </div>
        </div>
    </div>
    
@endsection

@section('admin-body-scripts')
    <script>
        const ORDER_DATA_VALUES = @json(array_values($orderData));
        const ORDER_DATA_KEYS = @json(array_keys($orderData));

        const BRAND_DATA_VALUES = @json(array_values($brandData));
        const BRAND_DATA_KEYS = @json(array_keys($brandData));

        const CATEGORY_DATA_VALUES = @json(array_values($categoryData));
        const CATEGORY_DATA_KEYS = @json(array_keys($categoryData));
    </script>

    <script src="{{ @asset('js/script-cl.js') }}"></script>
    <script src="{{ @asset('js/script-cp.js') }}"></script>
@endsection
