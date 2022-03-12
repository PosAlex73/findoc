@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'users.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>

    </form>
@endsection
