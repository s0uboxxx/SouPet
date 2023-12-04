@extends('admin.layouts.index')

@section('modal')
    @include('admin.users.form')
@endsection

@section('admin-content')
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-1"
        onclick="showForm('','','Thêm mới', 'Thêm', '{{ url()->current() . '/create' }}')">
        Thêm mới
    </button>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                @if ($users->count() > 0)
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-300">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Tên</th>
                            <th class="px-4 py-3">Ngày sinh</th>
                            <th class="px-4 py-3">Giới tính</th>
                            <th class="px-4 py-3">Số điện thoại</th>
                            <th class="px-4 py-3">Địa chỉ</th>
                            <th class="px-4 py-3">Avatar</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Vai trò</th>
                            <th class="px-4 py-3">Trạng thái</th>
                            <th class="px-4 py-3">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y text-white">
                        @foreach ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-ellipsis overflow-hidden w-48"
                                    style="max-width: 200px;text-overflow:ellipsis">
                                    {{ $user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->dob ? date('d/m/Y', strtotime($user->dob)) : '' }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->gender }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->phone }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->address }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <img src="{{ $user->avatar ? asset('/images/user') . '/' . $user->avatar : asset('/images/logo-icon.avif') }}"
                                        class="h-12 w-12 object-cover object-center rounded-full" />
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->role->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->userStatus->status }}
                                </td>
                                <td class="px-4 py-3 text-sm flex items-center">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 
                                        rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        onclick="showForm('{{ $user->id }}', 
                                        {'name' : '{{ $user->name }}', 'dob' : '{{ $user->dob }}', 
                                        'gender' : '{{ $user->gender }}', 'phone' : '{{ $user->phone }}',
                                        'address' : '{{ $user->address }}', 'email' : '{{ $user->email }}',
                                        'id_role' : '{{ $user->id_role }}', 'id_status' : '{{ $user->id_status }}',
                                        'image' : '{{ asset('/images/user') . '/' . $user->avatar }}'},
                                        'Sửa thông tin', 'Sửa', 
                                        '{{ url()->current() . '/edit' }}')"
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
                                        onclick="openModal('{{ url()->current() . '/delete?id=' . $user->id }}', 'Xóa người dùng', '{{ $user->name }}')">
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
        @if ($users->total() > 0)
            <div class="mt-4">
                {{ $users->links() }}
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
@section('admin-body-scripts')
    <script src="{{ asset('js/script-ip.js') }}" defer></script>
@endsection
