@extends('layouts.admin')
@section('content')
    <form action="{{ route('documents.mass_delete') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'dashboard'])
                @include('admin.components.buttons.create_new', ['item' => 'documents'])
                @include('admin.components.buttons.mass_delete')
            </div>
        </div>
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('vars.documents') }}</h6>
                        @if($documents->count() > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('vars.title') }}</th>
                                    <th>{{ __('vars.user') }}</th>
                                    <th>{{ __('vars.notice') }}</th>
                                    <th>{{ __('vars.created') }}</th>
                                    <th>{{ __('vars.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    <tr>
                                        <td>
                                            <a href="{{ route('documents.edit', ['document' => $document]) }}">
                                                {{ $document->title }}
                                            </a>
                                        </td>
                                        <td>{{ $document->short_notice }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', ['user' => $document->user]) }}">
                                                {{ $document->user->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $document->created_at }}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="documents[]"
                                                value="{{ $document->id }}"
                                                id="{{ $document->id }}"
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
        @include('admin.components.pagination', ['items' => $documents, 'route' => 'documents'])

    </form>


@endsection
