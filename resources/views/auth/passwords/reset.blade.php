@extends('layouts.app')

@section('title', 'Đặt lại mật khẩu')

@section('content')
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Đặt lại mật khẩu
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                {{ __('Địa chỉ Email') }}
                            </label>
                            <input id="email" type="email" name="email" placeholder="name@company.com"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                                    focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                    @error('email') is-invalid @enderror"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                {{ __('Mật khẩu') }}
                            </label>
                            <input id="password" type="password" name="password" placeholder="••••••••"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                                    focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                    @error('password') is-invalid @enderror"
                                required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-900">
                                {{ __('Xác nhận mật khẩu') }}
                            </label>
                            <input id="password-confirm" type="password" name="password_confirmation" placeholder="••••••••"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                                    focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required autocomplete="new-password">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none 
                                focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                            {{ __('Gửi liên kết đặt lại mật khẩu') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đặt lại mật khẩu') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Địa chỉ Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Xác nhận mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đặt lại mật khẩu') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
