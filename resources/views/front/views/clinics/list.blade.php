@extends('layouts.front')
@section('content')
    <main>
        <div id="results">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Showing 10</strong> of 140 results</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search_bar_list">
                            <input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor...">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /results -->

        <div class="filters_listing">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <h6>Type</h6>
                        <div class="switch-field">
                            <input type="radio" id="doctors" name="type_patient" value="doctors">
                            <label for="doctors">Doctors</label>
                            <input type="radio" id="clinics" name="type_patient" value="clinics">
                            <label for="clinics">Clinics</label>
                        </div>
                    </li>
                    <li>
                        <h6>Layout</h6>
                        <div class="layout_view">
                            <a href="grid-list.html"><i class="icon-th"></i></a>
                            <a href="#0" class="active"><i class="icon-th-list"></i></a>
                            <a href="list-map.html"><i class="icon-map-1"></i></a>
                        </div>
                    </li>
                    <li>
                        <h6>Sort by</h6>
                        <select name="orderby" class="selectbox">
                            <option value="Closest">Closest</option>
                            <option value="Best rated">Best rated</option>
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                        </select>
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /filters -->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-12">
                    @if($clinics->count() > 0)
                        @foreach($clinics as $clinic)
                            <div class="strip_list wow fadeIn">
                                <a href="#0" class="wish_bt"></a>
                                <figure>
                                    <a href="detail-page.html"><img src="http://via.placeholder.com/565x565.jpg" alt=""></a>
                                </figure>
                                <h3>{{ $clinic->title }}</h3>
                                <p>{{ $clinic->description }}</p>
                                <a href="badges.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                                <ul>
                                    <li><a href="#0" onclick="onHtmlClick('Doctors', 0)" class="btn_listing">View on Map</a></li>
                                    <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
                                    <a href="{{ route('front.clinics.view', ['clinic' => $clinic]) }}">{{ __('vars.show_profile') }}</a>
                                    <li><a href="{{ route('front.record') }}">{{ __('vars.book_now') }}</a></li>
                                </ul>
                            </div>
                        @endforeach
                            @include('front.components.pagination', ['items' => $clinics, 'route' => 'front.clinics'])
                    @else
                        <p>{{ __('vars.no_doctors_found') }}</p>
                    @endif

                </div>
                <!-- /col -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
@endsection
