@extends('layouts.front')
@section('content')
    <main>
        <div id="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="{{ route('front.index') }}">Home</a></li>
                    <li><a href="{{ route('front.blog') }}">{{ __('vars.articles') }}</a></li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- /breadcrumb -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bloglist singlepost">
                        <p><img alt="" class="img-fluid" src="http://via.placeholder.com/1000x500.jpg"></p>
                        <h1>{{ $article->title }}</h1>
                        <div class="postmeta">
                            <ul>
                                <li><a href="#"><i class="icon_folder-alt"></i> {{ $article->category->title }}</a></li>
                                <li><a href="#"><i class="icon_clock_alt"></i>{{ $article->created_at }}</a></li>
                            </ul>
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">
                            <div class="dropcaps">
                                <p>{{ $article->text }}</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </main>
@endsection
