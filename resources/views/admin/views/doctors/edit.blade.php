@extends('layouts.admin')
@section('content')
    <form action="{{ route('histories.update', ['history' => $history]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'histories.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('vars.create_new') }}</h5>
                @include('admin.fields.input', ['name' => 'title', 'value' => $history->title])
                @include('admin.fields.textarea', ['name' => 'description', 'value' => $history->description])
                <p class="card-text">
                    <a href="{{ route('users.edit', ['user' => $history->user]) }}">{{ __('vars.user') }}: {{ $history->user->full_name }}
                    </a>
                </p>
            </div>
        </div>
    </form>
@endsection
