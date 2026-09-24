<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusCoin</title>


    {{-- Bootstrap CSS --}}
    <link rel="stylesheet"
          href="{{ asset('assets/css/bootstrap.css') }}">


    {{-- Mazer/App CSS --}}
    <link rel="stylesheet"
          href="{{ asset('assets/css/app.css') }}">


    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">


    @stack('styles')

</head>


<body>

<div id="app">


    {{-- SIDEBAR --}}

    <div id="sidebar">

        @include('layouts.sidebar')

    </div>


    {{-- MAIN CONTENT --}}

    <div id="main">


        {{-- MOBILE MENU --}}

        <header class="mb-3">

            <a href="#"
               class="burger-btn d-block d-xl-none">

                <i class="bi bi-justify fs-3"></i>

            </a>

        </header>


        {{-- PAGE CONTENT --}}

        @yield('content')


    </div>

</div>


{{-- Mazer JavaScript --}}

<script src="{{ asset('assets/js/app.js') }}"></script>


@stack('scripts')

</body>

</html>