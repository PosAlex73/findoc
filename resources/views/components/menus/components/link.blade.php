@php
$icon = !empty($item->icon) ? $item->icon : 'box';
$link = route($item->link)
@endphp

<li class="nav-item">
    <a href="{{ $link }}" class="nav-link">
        <i class="link-icon" data-feather="{{ $icon }}"></i>
        <span class="link-title">{{ $item->title }}</span>
    </a>
</li>

