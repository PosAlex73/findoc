<ul class="nav nav-pills my-3">
    <li class="nav-item">
        <a class="nav-link @if(Route::currentRouteName() === 'users.edit') active @endif"
           aria-current="page"
           href="{{ route('users.edit', ['user' => $user]) }}">
            {{ __('vars.profile') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::currentRouteName() === 'threads') active @endif"
           href="{{ route('threads', ['user' => $user]) }}">
            {{ __('vars.threads') }}
        </a>
    </li>
</ul>
