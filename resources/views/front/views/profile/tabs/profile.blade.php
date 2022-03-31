@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp

<form action="{{ route('front.profile.update') }}" method="post">
    @csrf
    <p>{{ __('vars.user_profile') }}</p>
    @include('front.fields.input', ['name' => 'first_name', 'value' => $user->first_name])
    @include('front.fields.input', ['name' => 'last_name', 'value' => $user->last_name])
    @include('')
</form>
