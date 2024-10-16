<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
        <h2 class="m-0 text-primary"><img src="{{ asset('Front') }}/img/logo1.png" alt="logo" width="130px"
                                          height="120px"></h2>
    </a>
    <button type="button" class="navbar-toggler me-1" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="margin-left: 20px;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">{{ __('dashboard.home') }}</a>
            @if(!auth()->check())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __('front.data_trade') }}</a>
                    <div class="dropdown-menu fade-down m-0">
                            <a href="{{ route('login') }}" class="dropdown-item"> {{ __('front.login') }} </a>
                            <a href="{{ route('login_company') }}" class="dropdown-item"> {{ __('front.company_login') }} </a>

                    </div>
                </div>
            @endif
            <a href="{{ route('about') }}" class="nav-item nav-link"> {{ __('dashboard.about_us') }}</a>
            <a href="{{ route('blogs') }}" class="nav-item nav-link">{{ __('dashboard.blogs') }}</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link"> {{ __('dashboard.contact_us') }}</a>
            <a href="{{ route('certificates.index') }}" class="nav-item nav-link"> {{ __('front.certificates') }}</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __('front.forms') }}</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{ route('login_company') }}"
                       class="dropdown-item">{{ __('front.certificate_integrity') }}</a>
                    <a href="{{ route('login_company') }}" class="dropdown-item"> {{ __('front.step_system') }} </a>
                    <a href="{{ route('login_company') }}" class="dropdown-item"> {{ __('front.student_system') }} </a>
                    <a href="{{ route('login_qgo') }}" class="dropdown-item"> {{ __('front.qgo_system') }} </a>
                    <a href="{{ route('login') }}" class="dropdown-item"> {{ __('front.student_profile') }} </a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"
                   data-bs-toggle="dropdown"> {{ __('dashboard.language') }}</a>
                <div class="dropdown-menu fade-down m-0">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @if(Auth::guard('web')->check())
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"
                   data-bs-toggle="dropdown"> {{ Auth::guard('web')->user()->user_name }}</a>
                <div class="dropdown-menu fade-down m-0 mt-3">
                    @if(auth()->guard('web'))
                        <a href="{{ route('user_profile') }}" class="dropdown-item">{{ __('front.user_profile') }}</a>
                        <a href="{{ route('services.index') }}" class="dropdown-item"> {{ __('front.data_trade') }} </a>
                    @else
                        <a href="{{ route('student_profile') }}" class="dropdown-item">{{ __('front.student_profile') }}</a>
                    @endif
                    <a href="{{ route('logout') }} " class="dropdown-item">{{ __('dashboard.logout') }}</a>
                </div>
            </div>
        @else
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->guard('company')->check() ? auth()->guard('company')->user()->email : '' }}</a>
                <div class="dropdown-menu fade-down m-0">
                    @if(auth()->guard('company')->check())
                        <a href="{{ route('company_profile') }}" class="btn  py-4  nav-link " style="background-color: transparent;color: #000;border: none;">{{ __('front.company_profile') }} <i class="bi bi-building"></i></a>
                        <a href="{{ route('logout') }} " class="dropdown-item">{{ __('dashboard.logout') }}</a>
                    @endif
                </div>
            </div>
        @endif
        <a href="{{ route('appointement') }}"
           class="btn btn-primary py-4 px-lg-5 nav-item nav-link ">  {{ __('dashboard.book_appointment') }}</a>
    </div>
</nav>
