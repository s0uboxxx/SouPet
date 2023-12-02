@extends('layouts.app')

@section('title', 'Chỉnh sửa thông tin')

@section('content')
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Thông tin cá nhân</p>
                                <p>Vui lòng cập nhật đầy đủ thông tin.</p>

                                <div class="image overflow-hidden flex justify-center h-5/6 relative">
                                    <label for='avatar' class='mx-auto my-auto'>
                                        <img id="image-preview" class="rounded-full w-40 h-40 border-4 border-white"
                                            src=" {{ $user->avatar == null ? asset('images/logo-icon.avif') : asset('images/user/' . $user->avatar) }}"
                                            alt="">
                                        <input type="file" class="absolute top-0 left-0 w-full h-full opacity-0"
                                            id="avatar" name="avatar" onchange="previewImage(this)">
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
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $user->email }}" disabled />
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" id="phone"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $user->phone }}" pattern="^0?[0-9]{9}$"
                                            title="Vui lòng nhập đúng số điện thoại. VD: 0123456789" />
                                    </div>

                                    <div class="md:col-span-1">
                                        <label for="gender">Giới tính</label>
                                        <select name="gender" id="gender"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                            <option value=""></option>
                                            <option value="Nam" <?php echo $user->gender === 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                            <option value="Nữ" <?php echo $user->gender === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-4">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" name="address" id="address"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $user->address }}" />
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="dob">Ngày sinh</label>
                                        <input type="date" name="dob" id="dob"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $user->dob }}" />
                                    </div>

                                    @if (Auth::user()->id_status == 4)
                                        <div class="md:col-span-3">
                                            <label for="open_account" class="italic">*Nếu bạn muốn mở lại tài khoản</label>
                                            <button id="openAccountBtn"
                                                class="h-10 border mt-1 rounded w-full
                                                bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                Mở tài khoản
                                            </button>
                                        </div>
                                    @elseif(Auth::user()->id_status == 1)
                                        <div class="md:col-span-3">
                                            <label for="close_account" class="italic">*Nếu bạn muốn đóng tài khoản</label>
                                            <button id="closeAccountBtn"
                                                class="h-10 border mt-1 rounded w-full
                                                bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                Đóng tài khoản
                                            </button>
                                        </div>
                                    @else
                                        <div class="md:col-span-3">
                                            <label for=""></label>
                                            <div class="text-red-700 text-lg italic pt-2.5">
                                                Tài khoản của bạn đã bị khóa
                                            </div>
                                        </div>
                                    @endif
                                    <input type="hidden" name="id_status" value="1">
                                    <div class="md:col-span-5 text-right">
                                        <div class="inline-flex items-end">
                                            <button id="submit" type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Cập nhật
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
    </div>
@endsection

@section('body_scripts')
    <script src="{{ asset('js/script-ue.js') }}" defer></script>
    <script src="{{ asset('js/script-ip.js') }}" defer></script>
@endsection
