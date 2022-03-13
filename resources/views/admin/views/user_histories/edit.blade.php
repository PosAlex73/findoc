@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'users.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->full_name }}</h5>
                @include('admin.fields.input', ['name' => 'first_name', 'value' => $user->first_name])
                @include('admin.fields.input', ['name' => 'last_name', 'value' => $user->last_name])
                @include('admin.fields.email', ['name' => 'email', 'value' => $user->email])
                @include('admin.fields.number', ['name' => 'age', 'value' => $user->age])
                @include('admin.fields.select', ['name' => 'gender', 'variants' => $genders, 'selected' => $user->gender])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $user_statuses, 'selected' => $user->status])
                @include('admin.fields.select', ['name' => 'type', 'variants' => $user_types, 'selected' => $user->type])
            </div>
        </div>
    </form>
@endsection
