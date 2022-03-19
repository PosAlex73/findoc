@extends('layouts.admin')
@section('content')
    <form action="{{ route('specs.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'specs'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.doctors') }}</h6>
                        @if($doctors->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.full_name') }}</th>
                                    <th>{{ __('vars.category') }}</th>
                                    <th>{{ __('vars.phone') }}</th>
                                    <th>{{ __('vars.status') }}</th>
                                    <th>{{ __('vars.address') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>
                                            <a href="{{ route('specs.edit', ['spec' => $doctor]) }}">
                                                {{ $doctor->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $doctor->category->title }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ __('vars.status_' . $doctor->spec_status) }}</td>
                                        <td>{{ $doctor->address }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="specs[]"
                                                value="{{ $doctor->id }}"
                                                id="{{ $doctor->id }}"
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
        @include('admin.components.pagination', ['items' => $doctors, 'route' => 'specs'])

    </form>


@endsection
