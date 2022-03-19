@extends('layouts.admin')
@section('content')
    <form action="{{ route('vacancies.update', ['vacancy' => $vacancy]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'vacancies.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title', 'value' => $vacancy->title])
                @include('admin.fields.textarea', ['name' => 'text', 'value' => $vacancy->text])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $vacancy_statuses, 'selected' => $vacancy->status])
                @include('admin.fields.select', ['name' => 'category_id', 'variants' => $categories, 'key' => 'id', 'value' => 'title'])
            </div>
        </div>
    </form>
@endsection
