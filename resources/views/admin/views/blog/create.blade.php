@extends('layouts.admin')
@section('content')
    <form action="{{ route('blogs.store') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'blogs.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title'])
                @include('admin.fields.textarea', ['name' => 'text'])
                @include('admin.fields.image', ['name' => 'image'])
                @include('admin.fields.select', ['name' => 'category_id', 'variants' => $categories, 'key' => 'id', 'value' => 'title'])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $article_statuses])
            </div>
        </div>
    </form>
@endsection
