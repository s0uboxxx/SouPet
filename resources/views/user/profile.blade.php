@extends('layouts.app')

@section('title', 'Thông tin cá nhân')

@section('content')
    <div class="container mx-auto my-8">
        <div class="md:flex no-wrap md:-mx-2 ">
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden flex justify-center group">
                        <img class="rounded-full mx-auto w-32 h-32 shadow-md border-4 border-white 
                        transition duration-200 transform group-hover:scale-110 group-hover:my-2 my-0.5 "
                            src=" {{ $user->avatar == null ? asset('images/logo-icon.avif') : asset('images/user/' . $user->avatar) }}"
                            alt="">
                    </div>

                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center">
                        {{ explode(' ', $user->name)[count(explode(' ', $user->name)) - 1] }}
                    </h1>
                    <h3 class="text-center text-sm text-gray-400 font-medium"> {{ $role->name }} </h3>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Trạng thái</span>
                            <span class="ml-auto">
                                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">
                                    {{ $userStatus->status }}
                                </span>
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Ngày tham gia</span>
                            <span class="ml-auto">{{ $user->created_at->format('d/m/Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full md:w-9/12 mx-2 h-64">
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide text-base">Thông tin</span>
                    </div>
                    <div class="text-gray-700 mt-2">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Họ và tên</div>
                                <div class="px-4 py-2"> {{ $user->name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{ $user->email }} "> {{ $user->email }} </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Giới tính</div>
                                <div class="px-4 py-2">
                                    {{ $user->gender }}
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Số điện thoại</div>
                                <div class="px-4 py-2"> {{ $user->phone }} </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Địa chỉ</div>
                                <div class="px-4 py-2"> {{ $user->address }} </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"> Ngày sinh </div>
                                <div class="px-4 py-2"> {{ date('d/m/Y', strtotime($user->dob)) }} </div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 
                        focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        <a href="{{ route('editProfile') }}">Chỉnh sửa thông tin</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
