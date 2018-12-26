<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.includes.head')
<body>
    <div id="app">
        @include('layouts.includes.nav')

        <main class="py-4">
            <div class="container">

                <div class="row justify-content-center">
                    @include('layouts.includes.siderbar')

                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
