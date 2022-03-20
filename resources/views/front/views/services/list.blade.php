@extends('layouts.front')
@section('content')
    <main>
        <div class="container">
            @if($categories->count() > 0)
            <div class="row justify-content-center">
                @foreach($categories as $category)
                    <div class="card col-3 m-2 shadow rounded">
                        <div class="card-body">
                            <p class="card-text">
                                <a href="{{ route('front.categories.view', ['category' => $category]) }}">
                                    {{ $category->title }}
                                </a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <p>{{ __('vars.categories_not_found') }}</p>
            @endif
        </div>
    </main>
@endsection
