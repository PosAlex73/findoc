@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'users.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])

        <div class="card">
            <div class="card-body">

                <ul class="nav nav-pills my-3">
                    <li class="nav-item">
                        <a class="nav-link @if(Route::currentRouteName() === 'users.edit') active @endif"
                           aria-current="page"
                           href="{{ route('users.edit', ['user' => $user]) }}">
                            {{ __('vars.profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Route::currentRouteName() === 'threads') active @endif"
                           href="{{ route('threads', ['user' => $user]) }}">
                            {{ __('vars.threads') }}
                        </a>
                    </li>
                </ul>
            @if(Route::currentRouteName() === 'users.edit')
                @include('admin.views.users.components.profile')
            @elseif(Route::currentRouteName() === 'threads')
                @include('admin.views.users.components.thread')
            @endif
            </div>
        </div>
    </form>
@endsection
