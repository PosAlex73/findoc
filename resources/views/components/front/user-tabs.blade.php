<ul class="nav nav-pills">
    @foreach($tabs as $key => $tab)
        <li class="nav-item">
            <a class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() === $key) active @endif"
               aria-current="page"
               href="{{ route($key) }}">{{ __('vars.user_tab_' . $key) }}</a>
        </li>
    @endforeach
</ul>
