@extends('layouts.admin')
@section('content')
    <form action="{{ route('blogs.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'blogs'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.blogs') }}</h6>
                        @if($articles->count() > 0)
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('vars.title') }}</th>
                                        <th>{{ __('vars.created_at') }}</th>
                                        <th>{{ __('vars.short_description') }}</th>
                                        <th>{{ __('vars.status') }}</th>
                                        <th>{{ __('vars.category') }}</th>
                                        <th>{{ __('vars.delete') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>
                                                <a href="{{ route('blogs.edit', ['blog' => $article]) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $article->created_at }}
                                            </td>
                                            <td>{{ $article->short_description }}</td>
                                            <td>{{ __('vars.statuses' . $article->status) }}</td>
                                            <td>{{ $article->category->title }}</td>
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    name="articles[]"
                                                    value="{{ $article->id }}"
                                                    id="{{ $article->id }}"
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>{{ __('var.no_articles_found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.pagination', ['items' => $articles, 'route' => 'blogs'])
    </form>
@endsection
