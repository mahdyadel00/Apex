@extends('layouts.Frontend.master')
@section('content')


    <div class="login-wrap">
        <div class="login-html">
            <label for="tab-2" class="tab">{{ __('dashboard.sign_up') }}</label>
            <div class="login-form">
                <form class="sign-in-htm" method="POST" action="{{ route('register_post') }}">
                    @csrf
                    <div class="group">
                        <label for="name" class="label" style="padding: 5px 0;">{{ __('dashboard.name') }}</label>
                        <input id="name" type="text" name="name" class="input" placeholder="{{ __('dashboard.enter_your_name') }}">
                    </div>
                    <div class="group">
                        <label for="email" class="label" style="padding: 5px 0;">{{ __('dashboard.email') }}</label>
                        <input id="email" type="email" name="email" class="input" placeholder="{{ __('dashboard.enter_your_email') }}">
                    </div>

                    <div class="group">
                        <label for="phone" class="label" style="padding: 5px 0;">{{ __('dashboard.phone') }}</label>
                        <input id="phone" type="text" name="phone" class="input" placeholder="{{ __('dashboard.enter_your_phone') }}">
                    </div>

                    <div class="group">
                        <label for="password" class="label" style="padding: 5px 0;">{{ __('dashboard.password') }}</label>
                        <input id="password" type="password" name="password" class="input" data-type="password" placeholder="{{ __('dashboard.enter_your_password') }}">
                    </div>
                    <div class="group">
                        <label for="password" class="label" style="padding: 5px 0;">{{ __('dashboard.confirm_password') }}</label>
                        <input id="password" type="password" name="password_confirmation" class="input" data-type="password" placeholder="{{ __('dashboard.confirm_password') }}">
                    </div>
                    <div class="group">
                        <button type="submit" class="btn btn-primary py-3 px-lg-5 nav-item  button ">{{ __('dashboard.sign_up') }}</button>
                    </div>
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <p>{{ __('dashboard.already_have_an_account') }}</p>
                    <a href="{{ route('login') }}">{{ __('dashboard.sign_in') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->
    @include('layouts.Frontend._footer')
@endsection
