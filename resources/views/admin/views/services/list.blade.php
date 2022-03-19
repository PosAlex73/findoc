@extends('layouts.admin')
@section('content')
    <form action="{{ route('services.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'services'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.services') }}</h6>
                        @if($services->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.title') }}</th>
                                    <th>{{ __('vars.price') }}</th>
                                    <th>{{ __('vars.status') }}</th>
                                    <th>{{ __('vars.category_id') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>
                                            <a href="{{ route('services.edit', ['service' => $service]) }}">
                                                {{ $service->title }}
                                            </a>
                                        </td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ __('vars.status_' . $service->status) }}</td>
                                        <td>{{ $service->category->title }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="categories[]"
                                                value="{{ $service->id }}"
                                                id="{{ $service->id }}"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>{{ __('var.no_services_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $services, 'route' => 'services'])

    </form>


@endsection
