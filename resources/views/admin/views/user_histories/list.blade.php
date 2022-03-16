@extends('layouts.admin')
@section('content')
    <form action="{{ route('histories.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'histories'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.user_histories') }}</h6>
                        @if($user_histories->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.title') }}</th>
                                    <th>{{ __('vars.user_name') }}</th>
                                    <th>{{ __('vars.created') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_histories as $history)
                                    <tr>
                                        <td>
                                            <a href="{{ route('histories.edit', ['history' => $history]) }}">
                                                {{ $history->user->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $history->title }}</td>
                                        <td>{{ $history->created_at }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="histories[]"
                                                value="{{ $history->id }}"
                                                id="{{ $history->id }}"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>{{ __('var.no_histories_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $user_histories, 'route' => 'histories'])

    </form>


@endsection
