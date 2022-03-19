@extends('layouts.admin')
@section('content')
    <form action="{{ route('specs.update', ['spec' => $doctor]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'specs.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $doctor->full_name }}</h5>
                @include('admin.fields.input', ['name' => 'first_name', 'value' => $doctor->first_name])
                @include('admin.fields.input', ['name' => 'last_name', 'value' => $doctor->last_name])
                @include('admin.fields.select', ['name' => 'category_id', 'variants' => $categories, 'key' => 'id', 'value' => 'title', 'selected' => $doctor->category_id])
                @include('admin.fields.textarea', ['name' => 'description', 'value' => $doctor->description])
                @include('admin.fields.textarea', ['name' => 'education', 'value' => $doctor->education])
                @include('admin.fields.input', ['name' => 'phone', 'value' => $doctor->phone])
                @include('admin.fields.input', ['name' => 'address', 'value' => $doctor->address])
                @include('admin.fields.number', ['name' => 'experience', 'value' => $doctor->experience])
                @include('admin.fields.select', ['name' => 'spec_status', 'variants' => $spec_statuses, 'selected' => $doctor->spec_status])
            </div>
        </div>
    </form>
@endsection
