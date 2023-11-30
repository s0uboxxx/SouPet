@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-bold text-lg">Chi tiết đơn hàng</p>
                        <p
                            class="font-medium text-base
                                {{ $storeOrder->status_id == 4
                                    ? 'text-red-600'
                                    : ($storeOrder->status_id == 1
                                        ? 'text-yellow-500'
                                        : ($storeOrder->status_id == 3
                                            ? 'text-green-500'
                                            : 'text-blue-500')) }}
                                ">
                            Trạng thái đơn hàng: {{ $storeOrder->orderStatus->status }} </p>

                        <div class="image overflow-hidden flex justify-center h-5/6 relative">
                            <label for='images' class='mx-auto my-auto'>
                                <img class="mt-6 w-ful" src="{{ asset('images/product/' . $storeOrder->product->image) }}"
                                    alt="{{ $storeOrder->product->name }}">
                            </label>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="name">Họ và tên</label>
                                <input type="text" name="name" id="name"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $storeOrder->user->name }}" disabled />
                            </div>

                            <div class="md:col-span-3">
                                <label for="email">Địa chỉ Email</label>
                                <input type="text" name="email" id="email"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $storeOrder->user->email }}" disabled />
                            </div>

                            <div class="md:col-span-2">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" id="phone"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $storeOrder->phone }}" disabled />
                            </div>
                            <div class="md:col-span-5">
                                <label for="address">Địa chỉ cụ thể</label>
                                <input type="text" name="address" id="address"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $storeOrder->address }}" disabled />
                            </div>

                            <div class="md:col-span-5">
                                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                    <thead class="ltr:text-left rtl:text-right">
                                        <tr>
                                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                                Tên sản phẩm
                                            </th>
                                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                                Đơn giá
                                            </th>
                                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                                Số lượng
                                            </th>
                                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                                Thành tiền
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200">
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $storeOrder->product->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ number_format($storeOrder->product->price, 0, ',', '.') }}đ</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ $storeOrder->quantity }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ number_format($storeOrder->total, 0, ',', '.') }}đ</td>
                                    </tbody>
                                </table>
                            </div>
                            <div class="md:col-span-5">
                                <div class="flex justify-end space-x-4">
                                    @if ($storeOrder->status_id == 1)
                                        <div class="text-right">
                                            <div class="inline-flex items-end">
                                                <button
                                                    onclick="openModal('{{ '/ordercancel?id=' . $storeOrder->id }}', 'Hủy đặt hàng', '{{ $storeOrder->product->name }}')"
                                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                    Hủy đơn hàng
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-right">
                                        <div class="inline-flex items-end">
                                            <a href="{{ route('trackingOrder') }}"
                                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Quay lại
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    {{-- <link rel="stylesheet" href="https://unpkg.com/awesomplete/awesomplete.css" /> --}}
@endsection

@section('head_scripts')
    <script>
        var urlr = '/order/detail'
        window.history.replaceState(null, null, urlr);
    </script>
@endsection

@section('body_scripts')
@endsection
