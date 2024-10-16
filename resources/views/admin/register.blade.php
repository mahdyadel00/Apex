<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ __('dashboard.registervendor') }}</title>

    <meta name="description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{ asset('dashboard') }}/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{ asset('dashboard') }}/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('dashboard') }}/assets/css/dashmix.min.css">

</head>

<body>
<!-- Page Container -->
@if (app()->getLocale() == 'ar')

    <div id="page-container" class="rtl-support">
        @else
            <div id="page-container">
                @endif
                <!-- Main Container -->
                <main id="main-container">
                    <!-- Page Content -->
                    @include('layouts.admin._message')

                    <div class="bg-image" style="background-image: url('assets/media/photos/photo19@2x.jpg');">
                        <div class="row g-0 justify-content-center bg-primary-dark-op">
                            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                                <!-- Sign In Block -->
                                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                    <div
                                        class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                                        <!-- Header -->
                                        <div class="mb-2 text-center">
                                            <a class="link-fx fw-bold fs-1" href="{{ route('admin.home') }}">
                                                <span class="text-dark">{{ __('dashboard.louts_delivery') }}</span>
                                            </a>
                                            <p class="text-uppercase fw-bold fs-sm text-muted">{{ __('dashboard.sign_up_vendor') }}</p>
                                        </div>
                                        <!-- END Header -->

                                        <!-- Sign In Form -->

                                        <form class="js-validation-signin" action="{{ route('admin.do.register') }}" method="post">
                                            @csrf
                                            <div class="mb-4 rtl-support">
                                                <div class="input-group input-group-lg">
                                                    <select class="form-control" id="vendor_category_id" name="vendor_category_id">
                                                        <option value="">{{ __('dashboard.vendor_category') }}</option>
                                                        @foreach ($vendor_categories as $vendor_category)
                                                            <option value="{{ $vendor_category->id }}">
                                                                {{ $vendor_category->data->where('lang_id', $lang_id)->first() != null ?
                                                                   $vendor_category->data->where('lang_id', $lang_id)->first()->name :
                                                                   $vendor_category->data->first()->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-4 rtl-support">
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="{{ __('dashboard.first_name') }}">
                                                </div>
                                            </div>

                                            <div class="mb-4 rtl-support">
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{ __('dashboard.last_name') }}">
                                                </div>
                                            </div>

                                            <div class="mb-4 rtl-support">
                                                <div class="input-group input-group-lg">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('dashboard.email') }}">
                                                </div>
                                            </div>

                                            <div class="mb-4 rtl-support">
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('dashboard.phone') }}">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-lg">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('dashboard.password') }}">
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="{{ __('dashboard.vendor_name') }}">
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" id="vendor_phone" name="vendor_phone" placeholder="{{ __('dashboard.vendor_phone') }}">
                                                </div>
                                            </div>


                                            <div class="mb-4">
                                                <label class="form-label" for="phone">{{ __('dashboard.national_id') }}</label>
                                                <input type="text" class="form-control" id="national_id" name="national_id"
                                                       placeholder="{{ __('dashboard.national_id') }}">
                                                @if ($errors->has('national_id'))
                                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label" for="image">{{ __('dashboard.tax_card') }}</label>
                                                <input type="file" class="form-control" id="tax_card" name="tax_card"
                                                       placeholder="{{ __('dashboard.Tax_card') }}">
                                                @if ($errors->has('tax_card'))
                                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('tax_card') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label" for="image">{{ __('dashboard.commercial_record') }}</label>
                                                <input type="file" class="form-control" id="commercial_record" name="commercial_record"
                                                       placeholder="{{ __('dashboard.commercial_record') }}">
                                                @if ($errors->has('commercial_record'))
                                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('commercial_record') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label" for="image">{{ __('dashboard.id_card') }}</label>
                                                <input type="file" class="form-control" id="image" name="id_card"
                                                       placeholder="{{ __('dashboard.id_card') }}">
                                                @if ($errors->has('id_card'))
                                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('id_card') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div
                                                class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" checked value="1">
                                                    <label class="form-check-label"
                                                           for="login-remember-me">{{ __('dashboard.remember_me') }}</label>
                                                </div>
                                            </div>
                                            <div class="text-center mb-4">
                                                <button type="submit" class="btn btn-hero btn-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i>
                                                    {{ __('dashboard.sign_in') }}
                                                </button>
                                            </div>
                                        </form>
                                        <!-- END Sign In Form -->
                                    </div>
                                    <div class="block-content bg-body">
                                        <div class="d-flex justify-content-center text-center push">
                                            <a class="item item-circle item-tiny me-1 bg-default" data-toggle="theme"
                                               data-theme="default" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xwork" data-toggle="theme"
                                               data-theme="assets/css/themes/xwork.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xmodern" data-toggle="theme"
                                               data-theme="assets/css/themes/xmodern.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xeco" data-toggle="theme"
                                               data-theme="assets/css/themes/xeco.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xsmooth" data-toggle="theme"
                                               data-theme="assets/css/themes/xsmooth.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xinspire" data-toggle="theme"
                                               data-theme="assets/css/themes/xinspire.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xdream" data-toggle="theme"
                                               data-theme="assets/css/themes/xdream.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny me-1 bg-xpro" data-toggle="theme"
                                               data-theme="assets/css/themes/xpro.min.css" href="#"></a>
                                            <a class="item item-circle item-tiny bg-xplay" data-toggle="theme"
                                               data-theme="assets/css/themes/xplay.min.css" href="#"></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sign In Block -->
                            </div>
                        </div>
                    </div>
                    <!-- END Page Content -->
                </main>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->

            <!--
              Dashmix JS

              Core libraries and functionality
              webpack is putting everything together at assets/_js/main/app.js
            -->
            <script src="{{ asset('dashboard') }}/assets/js/dashmix.app.min.js"></script>

            <!-- jQuery (required for jQuery Validation plugin) -->
            <script src="{{ asset('dashboard') }}/assets/js/lib/jquery.min.js"></script>

            <!-- Page JS Plugins -->
            <script src="{{ asset('dashboard') }}/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

            <!-- Page JS Code -->
            <script src="{{ asset('dashboard') }}/assets/js/pages/op_auth_signin.min.js"></script>
</body>

</html>
