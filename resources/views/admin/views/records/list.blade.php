@extends('layouts.admin')
@section('content')
    <form action="{{ route('records.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'records'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.records') }}</h6>
                        @if($records->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.user') }}</th>
                                    <th>{{ __('vars.doctor') }}</th>
                                    <th>{{ __('vars.text') }}</th>
                                    <th>{{ __('vars.datetime') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td>
                                            <a href="{{ route('records.edit', ['record' => $record]) }}">
                                                {{ $record->user->full_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', ['user' => $record->user]) }}">
                                                {{ $record->spec->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ substr($record->text, 0, 15), '...' }}</td>
                                        <td>{{ $record->datetime }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="records[]"
                                                value="{{ $record->id }}"
                                                id="{{ $record->id }}"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>{{ __('var.no_records_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $records])

    </form>


@endsection
