@extends('layouts.admin')
@section('content')
    <form action="{{ route('promotions.update', ['promotion' => $promotion]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'promotions.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.promotion') }}</h5>
                @include('admin.fields.input', ['name' => 'title', 'value' => $promotion->title])
                @include('admin.fields.textarea', ['name' => 'description', 'value' => $promotion->description])
                @include('admin.fields.select', ['name' => 'status', 'variants' => $promo_statuses, 'selected' => $promotion->status])
            </div>
        </div>
    </form>
@endsection
