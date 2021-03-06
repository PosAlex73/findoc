@extends('layouts.front')
@section('content')
    <main>
        <div id="results">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @include('front.components.total_search', ['items' => $promotions])
                    </div>
                    <div class="col-md-6">
                        <div class="search_bar_list">
                            <input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor...">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-12">
                    @if($promotions->count() > 0)
                        @foreach($promotions as $promotion)
                            <div class="strip_list wow fadeIn">
                                <a href="#0" class="wish_bt"></a>
                                <figure>
                                    <a href="detail-page.html"><img src="http://via.placeholder.com/565x565.jpg" alt=""></a>
                                </figure>
                                <small>{{ $promotion->title }}</small>
                                <p>{{ $promotion->description }}</p>

                                <a href="badges.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                                <ul>
                                    <li><a href="#0" onclick="onHtmlClick('Doctors', 0)" class="btn_listing">View on Map</a></li>
                                    <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
                                    <a href="{{ route('front.promotions.view', ['promotion' => $promotion]) }}">{{ __('vars.show_details') }}</a>
                                </ul>
                            </div>
                        @endforeach
                        @include('front.components.pagination', ['items' => $promotions, 'route' => 'front.promotions'])
                    @else
                        <p>{{ __('vars.no_promotions_found') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
