@extends('layouts.admin')
@section('content')
    <form action="{{ route('clinics.update', ['clinic' => $clinic]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'clinics.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title', 'value' => $clinic->title])
                @include('admin.fields.textarea', ['name' => 'description', 'value' => $clinic->description])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $clinic_statuses, 'selected' => $clinic->status])
                @include('admin.fields.number', ['name' => 'found', 'value' => $clinic->found])
                @include('admin.fields.input', ['name' => 'phone', 'value' => $clinic->phone])
                @include('admin.fields.input', ['name' => 'address', 'value' => $clinic->address])
            </div>
        </div>
    </form>
@endsection
