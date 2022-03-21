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
                <div class="col-xl-12 col-lg-12">
                    <nav id="secondary_nav">
                        <div class="container">
                            <ul class="clearfix">
                                <li><a href="#section_1" class="active">{{ __('vars.general_info') }}</a></li>
                                <li><a href="#section_2">{{ __('vars.reviews') }}</a></li>
                                <li><a href="#sidebar">{{ __('vars.booking') }}</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div id="section_1">
                        <div class="box_general_3">
                            <div class="profile">
                                <div class="row">
                                    <div class="col-lg-5 col-md-4">
                                        <figure>
                                            <img src="http://via.placeholder.com/565x565.jpg" alt="" class="img-fluid">
                                        </figure>
                                    </div>
                                    <div class="col-lg-7 col-md-8">
                                        <h1>{{ $clinic->title }}</h1>
                                        <ul class="contacts">
                                            <li>
                                                <h6>{{ __('vars.address') }}</h6>
                                                {{ $clinic->address }}
                                            </li>
                                            <li>
                                                <h6>{{ __('vars.phone') }}</h6> <a href="tel://{{ $clinic->phone }}">{{ $clinic->phone }}</a>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- /profile -->
                            <div class="indent_title_in">
                                <i class="pe-7s-user"></i>
                                <h3>{{ __('vars.doc_description') }}</h3>
                                <p>{{ __('var.doc_description_label') }}</p>
                            </div>
                            <div class="wrapper_indent">
                                <p>{{ $clinic->description }}</p>
                            </div>
                            <!-- /wrapper indent -->

                            <hr>
                        </div>
                        <!-- /section_1 -->
                    </div>
                    <!-- /box_general -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
@endsection
