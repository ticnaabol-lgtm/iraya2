<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body>
<div class="app-admin-wrap-layout-1 sidebar-full sidebar-theme-slate">
    @include('layouts.partials.sidebar')
    <div class="main-content-wrap">
        @include('layouts.partials.mobile')
        @include('layouts.partials.header')
        <div class="main-content-body">
            <br>
            @include('layouts.partials.navbar')

            <div class="mx-lg">
                @yield('content')
            </div>

            @include('layouts.partials.footer')
        </div>
    </div>
    @include('layouts.partials.settings')
</div>

@include('layouts.partials.notifications')
@include('layouts.partials.profile')

<div class="ul-sidebar-panel-overlay"></div>

@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">--}}

{{--        <!-- Styles -->--}}
{{--        <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}

{{--        @livewireStyles--}}

{{--        <!-- Scripts -->--}}
{{--        <script src="{{ mix('js/app.js') }}" defer></script>--}}
{{--    </head>--}}
{{--    <body class="font-sans antialiased bg-light">--}}
{{--        <x-jet-banner />--}}
{{--        @livewire('navigation-menu')--}}

{{--        <!-- Page Heading -->--}}
{{--        <header class="d-flex py-3 bg-white shadow-sm border-bottom">--}}
{{--            <div class="container">--}}
{{--                {{ $header }}--}}
{{--            </div>--}}
{{--        </header>--}}

{{--        <!-- Page Content -->--}}
{{--        <main class="container my-5">--}}
{{--            {{ $slot }}--}}
{{--        </main>--}}

{{--        @stack('modals')--}}

{{--        @livewireScripts--}}

{{--        @stack('scripts')--}}
{{--    </body>--}}
{{--</html>--}}
