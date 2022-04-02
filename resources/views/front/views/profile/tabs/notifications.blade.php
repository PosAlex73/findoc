@forelse($notifications as $notice)
    @if(!empty($notice->data['template']))
        @include('front.notifications.' . $notice->data['template'], ['item' => $notice])
    @else
        @include('front.notifications.common', ['item' => $notice])
    @endif
@empty
    <p>{{ __('vars.you_have_not_notifications') }}</p>
@endforelse
