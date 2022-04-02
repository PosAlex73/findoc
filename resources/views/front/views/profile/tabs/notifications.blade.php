@forelse($notifications as $notice)
    <p>{{ dump($notice)}}</p>
    <hr>
@empty
    <p>{{ __('vars.you_have_not_notifications') }}</p>
@endforelse
