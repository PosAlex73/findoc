<form action="{{ route('front.profile.update') }}" method="post">
    @csrf
    <p>{{ __('vars.user_profile') }}</p>
    @include('front.fields.input', ['name' => 'first_name', 'value' => Auth::user()->first_name])
</form>
