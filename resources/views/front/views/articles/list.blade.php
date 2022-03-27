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
            <div class="main_title">
                <h1>{{ __('vars.findoc_blog') }}</h1>
                <p>{{ __('vars.findoc_blog_description') }}</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <article class="blog wow fadeIn">
                        <div class="row g-0">
                            @if($articles->count() > 0)
                                @foreach($articles as $article)
                                    <div class="col-lg-7 mb-2">
                                        <figure>
                                            <a href="{{ route('front.blog.article', ['blog' => $article]) }}">
                                                <img src="http://via.placeholder.com/800x533.jpg" alt="" style="max-width: 533px">
                                                <div class="preview">
                                                    <span>{{ __('vars.read_mode') }}</span>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="post_info">
                                            <small>{{ $article->created_at }}</small>
                                            <h3><a href="{{ route('front.blog.article', ['blog' => $article]) }}">{{ $article->title }}</a></h3>
                                            <p>{{ $article->short_description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>{{ __('vars.no_articles_found') }}</p>
                            @endif
                        </div>
                    </article>
                    <!-- /article -->
                    @include('front.components.pagination', ['items' => $articles, 'route' => 'front.blog'])
                    <!-- /pagination -->
                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                    <div class="widget">
                        <form>
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                            </div>
                            <button type="submit" id="submit" class="btn_1"> Search</button>
                        </form>
                    </div>

                    @if($recent_articles->count() > 0)
                    <div class="widget">
                        <div class="widget-title">
                            <h4>{{ __('vars.recent_posts') }}</h4>
                        </div>
                        @foreach($recent_articles as $recent)
                            <ul class="comments-list">
                                <li>
                                    <div class="alignleft">
                                        <a href="#0"><img src="http://via.placeholder.com/160x160.jpg" alt=""></a>
                                    </div>
                                    <small>11.08.2016</small>
                                    <h3><a href="{{ route('front.blog.article', ['blog' => $article]) }}" title="">{{ $recent->title }}</a></h3>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                    @endif
                </aside>
            </div>
        </div>
    </main>
@endsection
