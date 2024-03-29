@extends('admin.layouts.index')

@section('title', 'Quản lý danh mục')

@section('modal')
    @include('admin.categories.form')
@endsection

@section('admin-content')
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-1"
        onclick="showForm('','','Thêm mới', 'Thêm', '{{ url()->current() . '/create' }}')">
        Thêm mới
    </button>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                @if ($categories->count() > 0)
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-300">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Tên</th>
                            <th class="px-4 py-3">Số sản phẩm</th>
                            <th class="px-4 py-3">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y text-white">
                        @foreach ($categories as $category)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-ellipsis overflow-hidden w-48"
                                    style="max-width: 200px;text-overflow:ellipsis">
                                    {{ $category->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $category->products->count() }}
                                </td>
                                <td class="px-4 py-3 text-sm flex items-center">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 
                                        rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        onclick="showForm('{{ $category->id }}', {'name' : '{{ $category->name }}'},'Sửa danh mục', 'Sửa', '{{ url()->current() . '/edit' }}')"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>

                                    <button
                                        class="flex btn-confirm items-center justify-between px-2 py-2 text-sm font-medium 
                                            leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        onclick="openModal('{{ url()->current() . '/delete?id=' . $category->id }}', 'Xóa danh mục', '{{ $category->name }}')">
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
        @if ($categories->total() > 0)
            <div class="mt-4">
                {{ $categories->links() }}
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
