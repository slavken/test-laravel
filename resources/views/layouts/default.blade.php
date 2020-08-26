<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name', 'Laravel')) | Сайт</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @include('includes.navbar')

            <div class="container my-5">
                @yield('content')
            </div>
        </div>

        @include('includes.footer')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
