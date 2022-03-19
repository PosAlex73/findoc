@extends('layouts.admin')
@section('content')
    <form action="{{ route('categories.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'categories'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.categories') }}</h6>
                        @if($categories->count() > 0)
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
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                <a href="{{ route('categories.edit', ['category' => $category]) }}">
                                                    {{ $category->title }}
                                                </a>
                                            </td>
                                            <td>{{ $category->short_description }}</td>
                                            <td>{{ __('vars.statuses' . $category->status) }}</td>
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    name="categories[]"
                                                    value="{{ $category->id }}"
                                                    id="{{ $category->id }}"
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
        @include('admin.components.pagination', ['items' => $categories, 'route' => 'categories'])
    </form>
@endsection
