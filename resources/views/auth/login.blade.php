@extends('layouts.app')
{{-- @section('styles')
    @vite('resources/css/app.css')
@endsection --}}

@section('title', 'Trang đăng nhập')

@section('content')
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Đăng nhập
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('Địa chỉ Email') }}</label>
                            <input id="email" type="email" name="email" placeholder="name@company.com"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 
                                    focus:border-primary-600 block w-full p-2.5
                                    @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('Mật khẩu') }}</label>
                            <input id="password" type="password" name="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                                    focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                    @error('password') is-invalid @enderror"
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" name="remember" aria-describedby="remember"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                        {{ old('remember') ? 'checked' : '' }}>
                                </div>
                                <div class="ml-1 text-sm">
                                    <label for="remember"
                                        class="text-gray-500">{{ __('Ghi nhớ') }}</label>
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-primary-600 hover:underline"
                                    href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            @endif

                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none 
                            focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            {{ __('Đăng nhập') }}
                        </button>
                        <p class="text-sm font-light text-gray-500">
                            {{ __('Vẫn chưa có tài khoản?') }}
                            <a href="{{ route('register') }}"
                                class="font-medium text-primary-600 hover:underline">
                                {{ __('Đăng ký ngay!') }}
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
