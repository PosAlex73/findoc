<!DOCTYPE html>
<html lang="en">
    @include('components.admin.meta')
    @yield('extend_meta')
<body>
<div class="main-wrapper">
    @include('components.admin.sidebar')
    @yield('content')
    <div class="page-wrapper">
        @include('components.admin.navbar')
        <div class="page-content">

        </div>
    @include('components.admin.footer')
    </div>
</div>
@include('components.admin.scripts')
</body>
</html>
