@if($history->count() > 0)
    @foreach($history as $item)
        <h4>{{ $item->title }}</h4>
        <p>{{ $item->description }}</p>
        <hr>
    @endforeach
@else
    <p>{{ __('vars.user_have_no_history_yes') }}</p>
@endif
