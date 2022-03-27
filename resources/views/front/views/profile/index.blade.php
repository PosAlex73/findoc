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
                                <li><a href="#section_1" class="active">General info</a></li>
                                <li><a href="#section_2">Reviews</a></li>
                                <li><a href="#sidebar">Booking</a></li>
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
                                        <small>Primary care - Internist</small>
                                        <h1>DR. Julia Jhones</h1>
                                        <span class="rating">
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star"></i>
											<small>(145)</small>
											<a href="badges.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
										</span>
                                        <ul class="statistic">
                                            <li>854 Views</li>
                                            <li>124 Patients</li>
                                        </ul>
                                        <ul class="contacts">
                                            <li>
                                                <h6>Address</h6>
                                                2726 Shinn Street, New York -
                                                <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"> <strong>View on map</strong></a>
                                            </li>
                                            <li>
                                                <h6>Phone</h6> <a href="tel://000434323342">+00043 4323342</a> - <a href="tel://000434323342">+00043 4323342</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- /profile -->
                            <div class="indent_title_in">
                                <i class="pe-7s-user"></i>
                                <h3>Professional statement</h3>
                                <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                            </div>
                            <div class="wrapper_indent">
                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapi.</p>
                                <h6>Specializations</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            <li>Abdominal Radiology</li>
                                            <li>Addiction Psychiatry</li>
                                            <li>Adolescent Medicine</li>
                                            <li>Cardiothoracic Radiology </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            <li>Abdominal Radiology</li>
                                            <li>Addiction Psychiatry</li>
                                            <li>Adolescent Medicine</li>
                                            <li>Cardiothoracic Radiology </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /row-->
                            </div>
                            <!-- /wrapper indent -->

                            <hr>

                            <div class="indent_title_in">
                                <i class="pe-7s-news-paper"></i>
                                <h3>Education</h3>
                                <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                            </div>
                            <div class="wrapper_indent">
                                <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapi.</p>
                                <h6>Curriculum</h6>
                                <ul class="list_edu">
                                    <li><strong>New York Medical College</strong> - Doctor of Medicine</li>
                                    <li><strong>Montefiore Medical Center</strong> - Residency in Internal Medicine</li>
                                    <li><strong>New York Medical College</strong> - Master Internal Medicine</li>
                                </ul>
                            </div>
                            <!--  End wrapper indent -->

                            <hr>

                            <div class="indent_title_in">
                                <i class="pe-7s-cash"></i>
                                <h3>Prices &amp; Payments</h3>
                                <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                            </div>
                            <div class="wrapper_indent">
                                <p>Zril causae ancillae sit ea. Dicam veritus mediocritatem sea ex, nec id agam eius. Te pri facete latine salutandi, scripta mediocrem et sed, cum ne mundi vulputate. Ne his sint graeco detraxit, posse exerci volutpat has in.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Service - Visit</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>New patient visit</td>
                                            <td>$34</td>
                                        </tr>
                                        <tr>
                                            <td>General consultation</td>
                                            <td>$60</td>
                                        </tr>
                                        <tr>
                                            <td>Back Pain</td>
                                            <td>$40</td>
                                        </tr>
                                        <tr>
                                            <td>Diabetes Consultation</td>
                                            <td>$55</td>
                                        </tr>
                                        <tr>
                                            <td>Eating disorder</td>
                                            <td>$60</td>
                                        </tr>
                                        <tr>
                                            <td>Foot Pain</td>
                                            <td>$35</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
