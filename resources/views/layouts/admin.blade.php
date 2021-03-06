<!DOCTYPE html>
<html lang="en">
    @include('components.admin.meta')
    @yield('extend_meta')
<body>
<div class="main-wrapper">
    @include('components.admin.sidebar')
    <div class="page-wrapper">
        @include('components.admin.navbar')
        <div class="page-content">
            @yield('content')
        </div>
    @include('components.admin.footer')
    </div>
</div>
@include('components.admin.scripts')
</body>
</html>
