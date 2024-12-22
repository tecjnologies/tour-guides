<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ Session::get('locale') === 'ar' ? 'rtl' : 'ltr'  }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Tour Guide - Homepage')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css') }}">
        @if (session('locale') === 'ar')
            <link rel="stylesheet" href="{{ asset('assets/css/custom-ar.css') }}">
        @endif
        {{-- <link rel="stylesheet" href="{{asset('assets/css/responsiveness.css') }}"> --}}
        @stack('css')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/plugins/slick/slick.js') }}"></script>
    </head>
    <body>
        <div class="min-h-screen ">
            @include('website.layouts.topbar')
            @include('website.layouts.navigation')
            <main>
                {{ $slot }}
            </main>
        </div>
        {{-- @include('website.layouts.footer') --}}
        @if (session('status'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('status') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });

        </script>
        @endif
        @stack('scripts')
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>