<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.front.meta')
    </head>
    <body>
        <div class="layer"></div>
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>
        @include('components.front.header')
        @yield('content')
        @include('components.front.footer')
        <div id="toTop"></div>
        @include('components.front.scripts')
    </body>
</html>
