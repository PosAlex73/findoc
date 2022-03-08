<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#{{ $item->title }}" role="button" aria-expanded="false" aria-controls="{{ $item->title }}">
        <i class="link-icon" data-feather="{{ $item->icon }}"></i>
        <span class="link-title">{{ __($item->title) }}</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="{{ $item->title }}">
        <ul class="nav sub-menu">
            @foreach($item->group as $group)
                <li class="nav-item">
                    <a href="{{ route($group) }}" class="nav-link">{{ __('vars.' . $group) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
