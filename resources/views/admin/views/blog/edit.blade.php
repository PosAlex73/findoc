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
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title', 'value' => $article->title])
                @include('admin.fields.textarea', ['name' => 'text', 'value' => $article->text])
                @include('admin.fields.image', ['name' => 'image', 'file' => $article->image, 'id' => $article->id])
                @include('admin.fields.select', ['name' => 'category_id', 'variants' => $categories, 'key' => 'id', 'value' => 'title', 'selected' => $article->category_id])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $article_statuses, 'selected' => $article->status])
            </div>
        </div>
    </form>
@endsection
