<header class="header">
    <div class="mx-auto px-6 py-1 !max-w-screen-xl">
        <div class="flex items-center justify-between">
            <div class="hidden text-gray-600 md:flex md:items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="logo" class="img-logo-header" src="{{ asset('images/logo.avif') }}">
                </a>
            </div>

            <div class="relative mt-6 max-w-lg mx-auto w-full ">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                <input id="search-input"
                    class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                    type="text" placeholder="Tìm kiếm sản phẩm">

                <ul id="suggestions" class="absolute bg-white border border-gray-300 mt-2 w-full rounded-md z-30"
                    style="display: none;">
                </ul>
            </div>
            <div class="flex items-center justify-end" id="navbarSupportedContent">
                <div class="navbar">
                    <div class="dropdown">
                        <span
                            class="dropbtn inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true"
                            style="background-color: rgb(0,191,255) !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.6" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <svg class="-mr-1 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>

                        <div class="dropdown-content rounded-2xl z-30">
                            <ul id="listAccount" class="navbar-nav ms-auto">
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link rounded-2xl"
                                                href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link rounded-2xl"
                                                href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 4)
                                            <a class="dropdown-item rounded-2xl" href="{{ route('dashboard') }}">
                                                {{ __('Trang quản trị') }}
                                            </a>
                                        @else
                                            <a class="dropdown-item rounded-2xl" href="{{ route('trackingOrder') }}">
                                                {{ __('Theo dõi đơn hàng') }}
                                            </a>
                                        @endif
                                        <a class="dropdown-item rounded-2xl" href="{{ route('profile') }}">
                                            {{ __('Thông tin cá nhân') }}
                                        </a>

                                        <a onclick="openModal('{{ route('changePassword') }}', 'Đặt lại mật khẩu', 'tài khoản')"
                                            class="dropdown-item rounded-2xl cursor-pointer">
                                            {{ __('Đổi mật khẩu') }}
                                        </a>

                                        <a class="dropdown-item rounded-2xl" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Đăng xuất') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="sm:flex sm:justify-center sm:items-center">
            <div class="flex flex-col sm:flex-row">
                <a class="my-2 text-gray-500 hover:text-gray-600 hover:font-semibold sm:mx-3 sm:mt-0
                {{ request()->is('/') ? 'font-semibold text-gray-800' : '' }}"
                    href="/">Home</a>
                <a class="my-2 text-gray-500 hover:text-gray-600 hover:font-semibold sm:mx-3 sm:mt-0
                {{ request()->is('food') ? 'font-semibold text-gray-800' : '' }}"
                    href="/food">Thức ăn</a>
                <a class="my-2 text-gray-500 hover:text-gray-600 hover:font-semibold sm:mx-3 sm:mt-0
                {{ request()->is('toy') ? 'font-semibold text-gray-800' : '' }}"
                    href="/toy">Đồ chơi</a>
                <a class="my-2 text-gray-500 hover:text-gray-600 hover:font-semibold sm:mx-3 sm:mt-0
                {{ request()->is('about') ? 'font-semibold text-gray-800' : '' }}"
                    href="/about">Giới thiệu</a>
            </div>
        </nav>
    </div>
</header>
