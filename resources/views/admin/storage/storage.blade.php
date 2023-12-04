@extends('admin.layouts.index')

@section('modal')
    @include('admin.storage.form')
@endsection

@section('admin-content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                @if ($storage->count() > 0)
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-300">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Tên</th>
                            <th class="px-4 py-3">Số lượng trong kho</th>
                            <th class="px-4 py-3">Ngày cập nhật</th>
                            <th class="px-4 py-3">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y text-white">
                        @foreach ($storage as $product)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    {{ ($storage->currentPage() - 1) * $storage->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-ellipsis overflow-hidden w-48"
                                    style="max-width: 200px;text-overflow:ellipsis">
                                    {{ $product->product->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $product->quantity }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $product->updated_at->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 text-sm flex items-center">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 
                                        rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        onclick="showForm('{{ $product->id }}', {'quantity' : '{{ $product->quantity }}'},'Bổ sung số lượng', 'Bổ sung', '{{ url()->current() . '/edit' }}')"
                                        aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                    <button
                                        class="flex btn-confirm items-center justify-between px-2 py-2 text-sm font-medium 
                                            leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        onclick="openModal('{{ url()->current() . '/delete?id=' . $product->id }}', 'Xóa sản phẩm khỏi kho', '{{ $product->product->name }}')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div class="flex justify-center items-center">
                        <p class="text-2xl text-gray-400">Không có sản phẩm nào</p>
                    </div>
                @endif
            </table>
        </div>
        @if ($storage->total() > 0)
            <div class="mt-4">
                {{ $storage->links() }}
            </div>
        @endif
    </div>
@endsection

{{-- @section('head_scripts')
    <script>
        var urlr = '/manages'
        window.history.replaceState(null, null, urlr);
    </script>
@endsection --}}
