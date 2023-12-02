@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <form method="POST" action="{{ route('storeOrder') }}">
                    @csrf
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Thông tin đặt hàng</p>
                            <p>Vui lòng cập nhật đầy đủ thông tin.</p>

                            <div class="image overflow-hidden flex justify-center h-5/6 relative">
                                <label for='images' class='mx-auto my-auto'>
                                    <img class="mt-6 w-ful" src="{{ asset('images/product/' . $product->image) }}"
                                        alt="{{ $product->name }}">
                                </label>
                            </div>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="name">Họ và tên</label>
                                    <input type="text" name="name" id="name"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $user->name }}" />
                                </div>

                                <div class="md:col-span-3">
                                    <label for="email">Địa chỉ Email</label>
                                    <input type="text" name="email" id="email"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->email }}"
                                        disabled />
                                </div>

                                <div class="md:col-span-2">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone" id="phone"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->phone }}"
                                        pattern="^0?[0-9]{9}$" title="Vui lòng nhập đúng số điện thoại. VD: 0123456789" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="address">Địa chỉ cụ thể</label>
                                    <input type="text" name="address" id="address"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $user->address }}" />
                                </div>

                                <input type="hidden" name="productId" value=" {{ $product->id }}">
                                <input type="hidden" name="quantity" value=" {{ $quantity }}">
                                <input type="hidden" name="total" value="{{ $product->price * $quantity }}">

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
                                                {{ $product->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                {{ number_format($product->price, 0, ',', '.') }}đ</td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                {{ $quantity }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                {{ number_format($product->price * $quantity, 0, ',', '.') }}đ</td>
                                        </tbody>
                                        <td colspan="4"
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-right">
                                            Tổng tiền: {{ number_format($product->price * $quantity, 0, ',', '.') }}
                                        </td>
                                    </table>
                                </div>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button id="submit" type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Đặt hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('head_scripts')
    <script>
        var urlr = '/order'
        window.history.replaceState(null, null, urlr);
    </script>
@endsection