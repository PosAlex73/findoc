@php
$icon = !empty($item->icon) ? $item->icon : 'box';
@endphp

<li class="nav-item">
    <a href="{{ route($item->link) }}" class="nav-link">
        <i class="link-icon" data-feather="{{ $icon }}"></i>
        <span class="link-title">{{ $item->title }}</span>
    </a>
</li>

