@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'users'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.users') }}</h6>
                        @if($users->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.name') }}</th>
                                    <th>{{ __('vars.email') }}</th>
                                    <th>{{ __('vars.status') }}</th>
                                    <th>{{ __('vars.type') }}</th>
                                    <th>{{ __('vars.age') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('users.edit', ['user' => $user]) }}">
                                                {{ $user->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ __('vars.user_status_' . $user->status) }}</td>
                                        <td>{{ __('vars.user_type_' . $user->type) }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="users[]"
                                                value="{{ $user->id }}"
                                                id="{{ $user->id }}"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>{{ __('var.no_users_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $users, 'route' => 'users'])

    </form>


@endsection
