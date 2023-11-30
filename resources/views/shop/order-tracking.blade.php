@extends('layouts.app')

@section('title', 'Theo dõi đơn hàng')

@section('content')
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                Tên sản phẩm
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                Tổng tiền
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                Trạng thái
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                Hành động
                            </th>
                        </tr>
                    </thead>
                    @foreach ($storeOrders as $order)
                        <tbody class="divide-y divide-gray-200">
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $order->product->name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ number_format($order->total, 0, ',', '.') }} đ
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $order->orderStatus->status }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 flex">
                                <a href="/order/d?id={{ $order->id }}">
                                    <svg class="h-8 w-8 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                </a>
                                @if ($order->status_id == 1)
                                    <button 
                                    onclick="openModal('{{ '/ordercancel?id=' . $order->id }}', 'Hủy đặt hàng', '{{ $order->product->name }}')">
                                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection