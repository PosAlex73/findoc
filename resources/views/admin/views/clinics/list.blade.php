@extends('layouts.admin')
@section('content')
    <form action="{{ route('clinics.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'clinics'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.doctors') }}</h6>
                        @if($clinics->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.title') }}</th>
                                    <th>{{ __('vars.status') }}</th>
                                    <th>{{ __('vars.found') }}</th>
                                    <th>{{ __('vars.phone') }}</th>
                                    <th>{{ __('vars.address') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clinics as $clinic)
                                    <tr>
                                        <td>
                                            <a href="{{ route('clinics.edit', ['clinic' => $clinic]) }}">
                                                {{ $clinic->title }}
                                            </a>
                                        </td>
                                        <td>{{ __('vars.clinic_status_' . $clinic->status) }}</td>
                                        <td>{{ $clinic->found }}</td>
                                        <td>{{ $clinic->phone }}</td>
                                        <td>{{ $clinic->address }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="clinics[]"
                                                value="{{ $clinic->id }}"
                                                id="{{ $clinic->id }}"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>{{ __('var.no_clinics_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $clinics, 'route' => 'clinics'])
    </form>
@endsection
