@extends('layouts.front')
@section('content')
    <main>
        <div id="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- /breadcrumb -->

        <div class="container margin_60">
            <div class="row">
                <x-front.user-tabs />
                <hr>
                @include('front.views.profile.tabs.' . str_replace('front.', '', Route::currentRouteName()))
            </div>
        </div>
    </main>
@endsection
