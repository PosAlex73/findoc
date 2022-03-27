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
                <h1>Findoctor Blog</h1>
                <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <article class="blog wow fadeIn">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <figure>
                                    <a href="blog-post.html">
                                        <img src="http://via.placeholder.com/800x533.jpg" alt="" style="max-width: 533px">
                                        <div class="preview">
                                            <span>Read more</span>
                                        </div>
                                    </a>
                                </figure>
                            </div>
                            <div class="col-lg-5">
                                <div class="post_info">
                                    <small>20 Nov. 2017</small>
                                    <h3><a href="blog-post.html">Nec nihil menandri appellantur ut</a></h3>
                                    <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                                    <ul>
                                        <li>
                                            <div class="thumb"><img src="http://via.placeholder.com/100x100.jpg" alt=""></div> Jessica Hoops
                                        </li>
                                        <li><i class="icon_comment_alt"></i> 20</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- /article -->





                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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
                    <!-- /widget -->

                    <div class="widget">
                        <div class="widget-title">
                            <h4>Recent Posts</h4>
                        </div>
                        <ul class="comments-list">
                            <li>
                                <div class="alignleft">
                                    <a href="#0"><img src="http://via.placeholder.com/160x160.jpg" alt=""></a>
                                </div>
                                <small>11.08.2016</small>
                                <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                            </li>
                            <li>
                                <div class="alignleft">
                                    <a href="#0"><img src="http://via.placeholder.com/160x160.jpg" alt=""></a>
                                </div>
                                <small>11.08.2016</small>
                                <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                            </li>
                            <li>
                                <div class="alignleft">
                                    <a href="#0"><img src="http://via.placeholder.com/160x160.jpg" alt=""></a>
                                </div>
                                <small>11.08.2016</small>
                                <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                            </li>
                        </ul>
                    </div>
                    <!-- /widget -->

                    <div class="widget">
                        <div class="widget-title">
                            <h4>Blog Categories</h4>
                        </div>
                        <ul class="cats">
                            <li><a href="#">Treatments <span>(12)</span></a></li>
                            <li><a href="#">News <span>(21)</span></a></li>
                            <li><a href="#">Events <span>(44)</span></a></li>
                            <li><a href="#">New treatments <span>(09)</span></a></li>
                            <li><a href="#">Focus in the lab <span>(31)</span></a></li>
                        </ul>
                    </div>
                    <!-- /widget -->

                    <div class="widget">
                        <div class="widget-title">
                            <h4>Popular Tags</h4>
                        </div>
                        <div class="tags">
                            <a href="#">Medicine</a>
                            <a href="#">Treatments</a>
                            <a href="#">Events</a>
                            <a href="#">Specialist</a>
                            <a href="#">Pills</a>
                            <a href="#">Cancer</a>
                        </div>
                    </div>
                    <!-- /widget -->

                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection
