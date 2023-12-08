@extends('admin.layouts.index')

@section('title', 'Quản lý người dùng')

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
                                    <button class="text-blue-500 hover:text-blue-700"
                                        onmouseover="showData('{{ $user->phone }}')" onmouseout="hideData()">
                                        <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <button class="text-blue-500 hover:text-blue-700"
                                        onmouseover="showData('{{ $user->address }}')" onmouseout="hideData()">
                                        <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <img src="{{ $user->avatar ? asset('/images/user') . '/' . $user->avatar : asset('/images/logo-icon.avif') }}"
                                        class="h-12 w-12 object-cover object-center rounded-full" />
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <button class="text-blue-500 hover:text-blue-700"
                                        onmouseover="showData('{{ $user->email }}')" onmouseout="hideData()">
                                        <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                        </svg>
                                    </button>
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

@section('admin-body-scripts')
    <script src="{{ asset('js/script-ip.js') }}" defer></script>
    <script src="{{ asset('js/script-si.js') }}" defer></script>
@endsection
