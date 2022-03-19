@extends('layouts.admin')
@section('content')
    <form action="{{ route('promotions.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'promotions'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.promotions') }}</h6>
                        @if($promotions->count() > 0)
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('vars.title') }}</th>
                                        <th>{{ __('vars.short_description') }}</th>
                                        <th>{{ __('vars.status') }}</th>
                                        <th>{{ __('vars.delete') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($promotions as $promotion)
                                        <tr>
                                            <td>
                                                <a href="{{ route('promotions.edit', ['promotion' => $promotion]) }}">
                                                    {{ $promotion->title }}
                                                </a>
                                            </td>
                                            <td>{{ $promotion->short_description }}</td>
                                            <td>{{ __('vars.statuses' . $promotion->status) }}</td>
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    name="promotions[]"
                                                    value="{{ $promotion->id }}"
                                                    id="{{ $promotion->id }}"
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>{{ __('var.no_categories_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $promotions, 'route' => 'promotions'])
    </form>
@endsection
