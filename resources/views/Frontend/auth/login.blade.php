@extends('layouts.Frontend.master')
@section('content')

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">{{ __('dashboard.sign_in') }}</label>
            <div class="login-form">
                <form class="sign-in-htm" method="POST" action="{{ route('login_post') }}">
                    @csrf
                    <div class="group">
                        <label for="email" class="label" style="padding: 5px 0;">{{ __('dashboard.email') }}</label>
                        <input id="email" name="email"  type="email" class="input" placeholder="{{ __('dashboard.enter_your_email') }}">
                    </div>
                    <div class="group">
                        <label for="password" class="label" style="padding: 5px 0;">{{ __('dashboard.password') }}</label>
                        <input id="password" name="password" type="password" class="input" placeholder="{{ __('dashboard.enter_your_password') }}">
                    </div>

                    <div class="group">
                       <button type="submit" class="btn btn-primary py-3 px-lg-5 nav-item nav-link button ">{{ __('dashboard.sign_in') }}</button>
                    </div>
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <p>{{ __('dashboard.dont_have_an_account') }}</p>
                    <a href="{{ route('register') }}">{{ __('dashboard.sign_up') }}</a>
                </div>
            </div>
        </div>
    </div>


    <!-- About End -->
    @include('layouts.Frontend._footer')
@endsection
