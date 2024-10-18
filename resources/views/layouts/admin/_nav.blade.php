<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="{{ route('admin.home') }}">
                <span class="smini-visible">
                    D<span class="opacity-75">x</span>
                </span>
                <span class="smini-hidden">
                    {{ __('dashboard.qaysegp') }}<span class="opacity-75"></span>
                    {{-- <span class="fw-normal">{{ __('dashboard.wash') }}</span> --}}
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                        data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Actions -->
        {{-- <div class="smini-hide">
            <div class="content-side content-side-full bg-body-light">
              <button type="button" class="btn w-100 btn-alt-primary">
                <i class="fa fa-plus opacity-50 me-1"></i> New Project
              </button>
            </div>
          </div> --}}
        <!-- END Side Actions -->

        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('admin.home') }}">
                        <i class="nav-main-link-icon fa fa-rocket"></i>
                        <span class="nav-main-link-name">{{ __('dashboard.dashboard') }}</span>
                    </a>
                </li>

                <li class="nav-main-heading">{{ __('dashboard.Site settings') }}</li>

<!--                @can('countries')-->
<!--                    <li class="nav-main-item">-->
<!--                        <a class="nav-main-link" href="{{ route('admin.countries.index') }}">-->
<!--                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>-->
<!--                            <span class="nav-main-link-name">{{ __('dashboard.countries') }}</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                @endcan-->
<!---->
<!--                @can('states')-->
<!--                    <li class="nav-main-item">-->
<!--                        <a class="nav-main-link" href="{{ route('admin.states.index') }}">-->
<!--                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>-->
<!--                            <span class="nav-main-link-name">{{ __('dashboard.states') }}</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                @endcan-->
                @can('users')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.users.index') }}">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.users') }}</span>
                        </a>
                    </li>
                @endcan


<!--                @can('roles')-->
<!--                    <li class="nav-main-item">-->
<!--                        <a class="nav-main-link" href="{{ route('admin.roles.index') }}">-->
<!--                            <i class="nav-main-link-icon fa fa-indent"></i>-->
<!--                            <span class="nav-main-link-name">{{ __('dashboard.roles') }}</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                @endcan-->
                @can('services')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('admin.services.index') }}">
                        <i class="nav-main-link-icon fa fa-cogs"></i>
                        <span class="nav-main-link-name">{{ __('dashboard.services') }}</span>
                    </a>
                </li>
                @endcan

                @can('our_businesses')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('admin.our_businesses.index') }}">
                        <i class="nav-main-link-icon fa fa-cogs"></i>
                        <span class="nav-main-link-name">{{ __('dashboard.our_businesses') }}</span>
                    </a>
                </li>
                @endcan
                @can('teams')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('admin.teams.index') }}">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">{{ __('dashboard.teams') }}</span>
                    </a>
                </li>
                @endcan

<!--                <li class="nav-main-heading">{{ __('dashboard.technical support') }}</li>-->

                @can('contacts')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('admin.contacts.index') }}">
                        <i class="nav-main-link-icon fa fa-circle-info"></i>
                        <span class="nav-main-link-name">{{ __('dashboard.contacts') }}</span>
                    </a>
                </li>
                @endcan


                @can('settings')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.settings.edit') }}">
                            <i class="nav-main-link-icon fa fa-cog"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.settings') }}</span>
                        </a>
                    </li>
                @endcan

                @can('sliders')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.sliders.index') }}">
                            <i class="nav-main-link-icon fa fa-sliders"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.sliders') }}</span>
                        </a>
                    </li>
                @endcan
                @can('abouts')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.abouts.edit') }}">
                            <i class="nav-main-link-icon fa fa-cog"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.abouts') }}</span>
                        </a>
                    </li>
                @endcan
                @can('privacy_polices')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.privacy_polices.edit') }}">
                            <i class="nav-main-link-icon fa fa-cog"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.privacy_polices') }}</span>
                        </a>
                    </li>
                @endcan
                @can('terms_conditions')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.terms_conditions.edit') }}">
                            <i class="nav-main-link-icon fa fa-file-contract
                            "></i>
                            <span class="nav-main-link-name">{{ __('dashboard.terms_conditions') }}</span>
                        </a>
                    </li>
                @endcan
                <li class="nav-main-heading">{{ __('dashboard.dashboards') }}</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('admin.home') }}">
                        <i class="nav-main-link-icon fa fa-arrow-left"></i>
                        <span class="nav-main-link-name">{{ __('dashboard.go_back') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
