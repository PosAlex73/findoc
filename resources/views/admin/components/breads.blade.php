<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        @foreach($break_crumbs as $crumb)
            <li class="breadcrumb-item @if($loop->last) active @endif"><a href="#">{{ $crumb }}</a></li>
        @endforeach
    </ol>
</nav>
