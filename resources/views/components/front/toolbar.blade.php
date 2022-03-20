<div class="main-menu">
    <ul>
        @foreach($menu as $route => $item)
        <li><a href="{{ route($route) }}">{{ __($item['name']) }}</a></li>
        @endforeach
    </ul>
</div>
