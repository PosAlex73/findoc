<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="index.html" title="Findoctor">Findoctor</a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <ul id="top_access">
                    @if(!Auth::check())
                    <li><a href="{{ route('login') }}"><i class="pe-7s-user"></i></a></li>
                    <li><a href="{{ route('register') }}"><i class="pe-7s-add-user"></i></a></li>
                    @else
                        <li><a href="{{ route('front.profile') }}"><i class="pe-7s-id"></i></a></li>
                        <li id="logout_button"><a href="{{ route('logout_get') }}"><i class="pe-7s-close-circle"></i></a></li>
                    @endif
                </ul>
                <x-front.toolbar />
                <!-- /main-menu -->
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
<!-- /header -->
