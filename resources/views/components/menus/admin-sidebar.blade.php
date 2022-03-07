@foreach($sidebar as $item)
    @if($item instanceof \App\Menus\Admin\Components\Title)
        @include('components.menus.components.title', ['item' => $item])
    @elseif($item instanceof \App\Menus\Admin\Components\Group)
        @include('components.menus.components.group', ['item' => $item])
    @else
        @include('components.menus.components.link', ['item' => $item])
    @endif
@endforeach
