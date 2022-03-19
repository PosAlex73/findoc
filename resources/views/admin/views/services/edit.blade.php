@extends('layouts.admin')
@section('content')
    <form action="{{ route('services.update', ['service' => $service]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'services.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title', 'value' => $service->title])
                @include('admin.fields.textarea', ['name' => 'description', 'value' => $service->description])
                @include('admin.fields.number', ['name' => 'price', 'value' => $service->price])
                @include('admin.fields.select', ['name' => 'category_id', 'variants' => $categories, 'key' => 'id', 'value' => 'title', 'selected' => $service->category->category_id])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $common_statuses, 'selected' => $service->status])
            </div>
        </div>
    </form>
@endsection
