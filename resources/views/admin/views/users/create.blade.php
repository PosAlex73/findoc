@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'users.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.crea_new_user') }}</h5>
                @include('admin.fields.input', ['name' => 'first_name'])
                @include('admin.fields.input', ['name' => 'last_name'])
                @include('admin.fields.password', ['name' => 'password'])
                @include('admin.fields.email', ['name' => 'email'])
                @include('admin.fields.number', ['name' => 'age'])
                @include('admin.fields.select', ['name' => 'gender', 'variants' => $genders])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $user_statuses])
                @include('admin.fields.select', ['name' => 'type', 'variants' => $user_types])
            </div>
        </div>
    </form>
@endsection
