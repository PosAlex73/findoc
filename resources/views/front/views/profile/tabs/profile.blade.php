@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp

<form action="{{ route('front.profile.update') }}" method="post">
    @csrf
    <p>{{ __('vars.user_profile') }}</p>
    @includeWhen(!empty(session('status')), 'front.flash.flashs', ['message' => session('status')])
    @include('front.flash.errors')
    @include('front.fields.input', ['name' => 'first_name', 'value' => $user->first_name])
    @include('front.fields.input', ['name' => 'last_name', 'value' => $user->last_name])
    @include('front.fields.number', ['name' => 'age', 'value' => $user->age])
    @include('front.fields.select', ['name' => 'gender', 'selected' => $user->gender, 'variants' => $genders])
    @include('front.fields.email', ['name' => 'email', 'value' => $user->email])
    @include('front.buttons.submit')
</form>
