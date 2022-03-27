@extends('layouts.front')
@section('content')
    <main>
        <div class="bg_color_2">
            <div class="container margin_60_35">
                <div id="login-2">
                    <h1>Please login to Findoctor!</h1>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="box_form clearfix">
                            @if(\App\Facades\Set::get(\App\Enums\Settings\SettingTypes::SOCIAL_LOGIN) === 'Y')
                            <div class="box_login">
                                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                                <a href="#0" class="social_bt google">Login with Google</a>
                                <a href="#0" class="social_bt linkedin">Login with Linkedin</a>
                            </div>
                            @endif
                            <div class="box_login last">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="{{ __('vars.enter_email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="{{ __('vars.enter_password') }}" name="password" id="password">
                                    <a href="#0" class="forgot"><small>{{ __('vars.forgot_password') }}</small></a>
                                </div>
                                <div class="form-group">
                                    <input class="btn_1" type="submit" value="Login">
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="text-center link_bright">{{ __('vars.have_not_password') }}
                        <a href="{{ route('register') }}">
                            <strong>{{ __('vars.register_now') }}</strong>
                        </a>
                    </p>
                </div>
                <!-- /login -->
            </div>
        </div>
    </main>
    <!-- /main -->
@endsection
