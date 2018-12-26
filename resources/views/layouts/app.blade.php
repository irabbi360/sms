<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.includes.head')
<body>
    <div id="app">
        @include('layouts.includes.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
