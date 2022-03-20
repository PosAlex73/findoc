@extends('layouts.front')
@section('content')
    <main class="m-2">
        <div class="container margin_60">
            <div class="box_general_2">
                <h1 class="text-center">{{ $service->title }}</h1>
                <p>{{ $service->description }}</p>
                <p>{{ __('vars.price') }}: {{ $service->price }}</p>
                <div class="text-center">
                    <a href="{{ route('front.new_record') }}" class="btn_1 medium">{{ __('vars.book_now') }}</a>
                </div>
            </div>
        </div>
    </main>
@endsection
