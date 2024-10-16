@extends('layouts.Frontend.master')
@section('content')

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">{{ __('dashboard.sign_in') }}</label>
            <div class="login-form">
                <form class="sign-in-htm" method="POST" action="{{ route('login_company_post') }}">
                    @csrf
                    <div class="group">
                        <label for="email" class="label" style="padding: 5px 0;">{{ __('dashboard.email') }}</label>
                        <input id="email" name="email" type="email" class="input"
                            placeholder="{{ __('dashboard.enter_your_email') }}">
                    </div>
                    <div class="group">
                        <label for="password" class="label" style="padding: 5px 0;">{{ __('dashboard.password') }}</label>
                        <input id="password" name="password" type="password" class="input"
                            placeholder="{{ __('dashboard.enter_your_password') }}">
                    </div>

                    <!-- <div class="group">
                        <label for="type" class="label" style="padding: 5px 0;">{{ __('front.type_system') }}</label>
                        <select name="type" id="type" class="select-form form-control">
                            <option value="step">{{ __('front.step_system') }}</option>
                            <option value="student">{{ __('front.student_system') }}</option>
                            <option value="certificate">{{ __('front.certificate_integrity') }}</option>
                        </select>
                    </div> -->

                    <div class="group">
                        <button type="submit"
                            class="btn btn-primary py-3 px-lg-5 nav-item nav-link button ">{{ __('dashboard.sign_in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- About End -->
    @include('layouts.Frontend._footer')
@endsection
