<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout.partial.header')
    </head>
    <body>
        @include('layout.partial.nevbar')

        <div class="container mt-5">
            @yield('content')
        </div>
    </body>
</html>