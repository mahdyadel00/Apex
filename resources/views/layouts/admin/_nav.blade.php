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

                @can('students')
                <li class="nav-main-heading">{{ __('dashboard.students') }}</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.students.index') }}">
                            <i class="nav-main-link-icon fa fa-user"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.students') }}</span>
                        </a>
                    </li>
                @endcan

                @can('quizzes')
                <li class="nav-main-heading">{{ __('dashboard.quizzes') }}</li>

                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.quizzes.index') }}">
                            <i class="nav-main-link-icon fa fa-calendar"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.quizzes') }}</span>
                        </a>
                    </li>
                @endcan
                @can('appointments')
                <li class="nav-main-heading">{{ __('dashboard.appointments') }}</li>

                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.appointments.index') }}">
                            <i class="nav-main-link-icon fa fa-calendar"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.appointments') }}</span>
                        </a>
                    </li>
                @endcan

                @can('appointments')
                <li class="nav-main-heading">{{ __('dashboard.blog') }}</li>

                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.categories.index') }}">
                            <i class="nav-main-link-icon fa fa-calendar"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.categories') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.posts.index') }}">
                            <i class="nav-main-link-icon fa fa-calendar"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.posts') }}</span>
                        </a>
                    </li>
                @endcan
                @can('step_systems')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.step_systems.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.step_systems') }}</span>
                        </a>
                    </li>
                @endcan
                @can('certificate_integrity')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.certificate_integrity.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.certificate_integrity') }}</span>
                        </a>
                    </li>
                @endcan
                @can('student_systems')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.student_systems.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.student_systems') }}</span>
                        </a>
                    </li>
                @endcan
                @can('qgos')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.qgos.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.qgo') }}</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-main-heading">{{ __('dashboard.Site settings') }}</li>

                @can('countries')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.countries.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.countries') }}</span>
                        </a>
                    </li>
                @endcan

                @can('states')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.states.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.states') }}</span>
                        </a>
                    </li>
                @endcan
                @can('sectors')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.sectors.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.sectors') }}</span>
                        </a>
                    </li>
                @endcan

                @can('centers')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.centers.index') }}">
                            <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.centers') }}</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-main-heading">{{ __('dashboard.technical support') }}</li>

                @can('contacts')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.contacts.index') }}">
                            <i class="nav-main-link-icon fa fa-circle-info"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.contacts') }}</span>
                        </a>
                    </li>
                @endcan

                @can('users')
                    <li class="nav-main-heading">{{ __('dashboard.Application settings') }}</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.users.index') }}">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.users') }}</span>
                        </a>
                    </li>
                @endcan

                @can('companies')
                    <li class="nav-main-heading">{{ __('dashboard.Application settings') }}</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.companies.index') }}">
                            <i class="nav-main-link-icon fa fa-companies"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.companies') }}</span>
                        </a>
                    </li>
                @endcan

                @can('services')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.services.index') }}">
                            <i class="nav-main-link-icon fa fa-companies"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.services') }}</span>
                        </a>
                    </li>
                @endcan

                @can('roles')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.roles.index') }}">
                            <i class="nav-main-link-icon fa fa-indent"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.roles') }}</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-main-heading">{{ __('dashboard.Application content') }}</li>
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
                @can('testimonials')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.testimonials.edit') }}">
                            <i class="nav-main-link-icon fa fa-testimonials"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.testimonials') }}</span>
                        </a>
                    </li>
                @endcan
                @can('informations')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.informations.index') }}">
                            <i class="nav-main-link-icon fa fa-informations"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.informations') }}</span>
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
                @can('abouts')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.value-services.index') }}">
                            <i class="nav-main-link-icon fa fa-cog"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.values_services') }}</span>
                        </a>
                    </li>
                @endcan
                @can('abouts')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.visions.edit') }}">
                            <i class="nav-main-link-icon fa fa-cog"></i>
                            <span class="nav-main-link-name">{{ __('dashboard.visions') }}</span>
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
