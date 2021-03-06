@extends('layouts.admin')
@section('content')
    <form action="{{ route('records.store') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'records.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.textarea', ['name' => 'text'])
                @include('admin.fields.user_select', ['users' => $doctors, 'field_name' => 'spec_id'])
                @include('admin.fields.user_select', ['users' => $simple_users])
                @include('admin.fields.date', ['name' => 'datetime'])
                @include('admin.fields.select', ['name' => 'type', 'variants' => $record_types])
            </div>
        </div>
    </form>
@endsection
