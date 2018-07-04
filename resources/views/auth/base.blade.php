<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('partials.favicons')
</head>
<body>
    <div id="app">
        <main class="py-5">
            @yield('content')
        </main>
    </div>
    <script src="/js/all.js"></script>
    @stack('scripts')
</body>
</html>
