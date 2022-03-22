@if($items->total() > \App\Facades\Set::get(\App\Enums\Settings\SettingTypes::FRONT_PAGINATION))
<nav aria-label="" class="add_top_20">
    <ul class="pagination pagination-sm">
        <li class="page-item  disabled">
            <a class="page-link @if($items->onFirstPage()) disabled @endif" href="#" tabindex="-1">{{ __('vars.first_page') }}</a>
        </li>
        @if(!$items->onFirstPage())
            <li class="page-item"><a class="page-link" href="{{ $items->previousPageUrl() }}">{{ __($items->currentPage() - 1) }}</a></li>
        @endif
        <li class="paginate_button page-item active">
            <a href="#" aria-controls="dataTableExample" data-dt-idx="2" tabindex="0" class="page-link">{{ $items->currentPage() }}</a>
        </li>
        @if(!$items->onLastPage())
            <li class="paginate_button page-item ">
                <a href="{{ $items->nextPageUrl() }}" aria-controls="dataTableExample" data-dt-idx="2" tabindex="0" class="page-link">{{ __($items->currentPage() + 1) }}</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route( $route) . '?page=' . $items->lastPage() }}">{{ __('vars.last') }}</a>
            </li>
        @endif
    </ul>
</nav>
@endif
