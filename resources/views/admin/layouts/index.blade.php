@extends('layouts.app')

@section('title', 'Trang quản lý')

@section('content')
    <div class="flex">
        <div class="w-1/6 p-4">
            @include('admin.layouts.sidebar')
        </div>
        <div class="w-5/6 p-4">
            @yield('admin-content')
        </div>
    </div>
@endsection

@section('head_scripts')
    <script src="{{ asset('js/script-as.js') }}"></script>
@endsection

@section('body_scripts')
    <script src="{{ asset('js/script-am.js') }}" defer></script>
    @yield('admin-body-scripts')
@endsection