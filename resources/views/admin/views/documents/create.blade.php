@extends('layouts.admin')
@section('content')
    <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'documents.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title'])
                @include('admin.fields.textarea', ['name' => 'notice'])
                @include('admin.fields.file', ['name' => 'path'])
                @include('admin.fields.user_select', ['users' => $simple_users])
            </div>
        </div>
    </form>
@endsection
