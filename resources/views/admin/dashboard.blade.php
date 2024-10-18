@extends('layouts.admin.app')

@section('content')
    <!-- Hero -->
    <div class="bg-image"
         style="background-image: url('{{ asset('dashboard') }}/assets/media/various/bg_dashboard.jpg');">
        <div class="bg-black-75">
            <div class="content content-full">
                <div class="row my-3">
                    <div class="col-md-6 d-md-flex align-items-md-center">
                        <div class="py-4 py-md-0 text-center text-md-start">
                            <h1 class="fs-2 text-white mb-2">{{ __('dashboard.dashboard') }}</h1>
                            <h2 class="fs-lg fw-normal text-white-75 mb-0">{{ __('dashboard.welcome') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{ route('admin.users.index') }}">
                    <div class="block-content block-content-full">
                        <div class="d-flex align-items-center justify-content-between p-1">
                            <div class="me-3">
                                <p class="text-muted mb-0">
                                    {{ __('dashboard.users') }}
                                </p>
                                <p class="fs-3 mb-0">
                                    {{ $users->count() }}
                                </p>
                            </div>
                            <div>
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{ route('admin.sliders.index') }}">
                    <div class="block-content block-content-full">
                        <div class="d-flex align-items-center justify-content-between p-1">
                            <div class="me-3">
                                <p class="text-muted mb-0">
                                    {{ __('dashboard.sliders') }}
                                </p>
                                <p class="fs-3 mb-0">
                                    {{ $sliders->count() }}
                                </p>
                            </div>
                            <div>
                                <i class="nav-main-link-icon fa fa-sliders"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{ route('admin.states.index') }}">
                    <div class="block-content block-content-full">
                        <div class="d-flex align-items-center justify-content-between p-1">
                            <div class="me-3">
                                <p class="text-muted mb-0">
                                    {{ __('dashboard.states') }}
                                </p>
                                <p class="fs-3 mb-0">{{ $states->count() }}</p>
                            </div>
                            <div>
                                <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{ route('admin.contacts.index') }}">
                    <div class="block-content block-content-full">
                        <div class="d-flex align-items-center justify-content-between p-1">
                            <div class="me-3">
                                <p class="text-muted mb-0">
                                {{ __('dashboard.contacts') }}
                                </p>
                                <p class="fs-3 mb-0"> {{ $contacts->count() }}</p>
                            </div>
                            <div>
                                <i class="nav-main-link-icon fa fa-circle-info"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <!-- END Quick Stats -->

        <!-- Users and Purchases -->
        {{-- <div class="row items-push">
            <div class="col-xl-6">
                <!-- Users -->
                <div class="block block-rounded block-mode-loading-refresh h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Users</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-cloud-download"></i>
                            </button>
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="si si-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-user me-1"></i> New Users
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-bookmark me-1"></i> VIP Users
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-pencil-alt"></i> Manage
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-dark">
                        <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                            <input type="text" class="form-control form-control-alt" placeholder="Search Users..">
                        </form>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                            <thead>
                                <tr class="text-uppercase">
                                    <th class="fw-bold text-center" style="width: 120px;">Avatar</th>
                                    <th class="fw-bold">Name</th>
                                    <th class="d-none d-sm-table-cell fw-bold">Access</th>
                                    <th class="fw-bold text-center" style="width: 60px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar32 img-avatar-thumb"
                                            src="assets/media/avatars/avatar6.jpg" alt="">
                                    </td>
                                    <td>
                                        <div class="fw-semibold fs-base">Amber Harvey</div>
                                        <div class="text-muted">carol@example.com</div>
                                    </td>
                                    <td class="d-none d-sm-table-cell fs-base">
                                        <span class="badge bg-dark">VIP</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Edit User">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar32 img-avatar-thumb"
                                            src="assets/media/avatars/avatar9.jpg" alt="">
                                    </td>
                                    <td>
                                        <div class="fw-semibold fs-base">Jesse Fisher</div>
                                        <div class="text-muted">smith@example.com</div>
                                    </td>
                                    <td class="d-none d-sm-table-cell fs-base">
                                        <span class="badge bg-black-50">Pro</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Edit User">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar32 img-avatar-thumb"
                                            src="assets/media/avatars/avatar16.jpg" alt="">
                                    </td>
                                    <td>
                                        <div class="fw-semibold fs-base">Ryan Flores</div>
                                        <div class="text-muted">john@example.com</div>
                                    </td>
                                    <td class="d-none d-sm-table-cell fs-base">
                                        <span class="badge bg-dark">VIP</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Edit User">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar32 img-avatar-thumb"
                                            src="assets/media/avatars/avatar5.jpg" alt="">
                                    </td>
                                    <td>
                                        <div class="fw-semibold fs-base">Amanda Powell</div>
                                        <div class="text-muted">lori@example.com</div>
                                    </td>
                                    <td class="d-none d-sm-table-cell fs-base">
                                        <span class="badge bg-black-50">Pro</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Edit User">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar32 img-avatar-thumb"
                                            src="assets/media/avatars/avatar14.jpg" alt="">
                                    </td>
                                    <td>
                                        <div class="fw-semibold fs-base">Henry Harrison</div>
                                        <div class="text-muted">jack@example.com</div>
                                    </td>
                                    <td class="d-none d-sm-table-cell fs-base">
                                        <span class="badge bg-success">Free</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Edit User">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Users -->
            </div>
            <div class="col-xl-6">
                <!-- Purchases -->
                <div class="block block-rounded block-mode-loading-refresh h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Purchases</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-cloud-download"></i>
                            </button>
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="si si-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-sync fa-spin text-warning me-1"></i> Pending
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-times-circle text-danger me-1"></i> Cancelled
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-check-circle text-success me-1"></i> Completed
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-eye me-1"></i> View All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-dark">
                        <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                            <input type="text" class="form-control form-control-alt" placeholder="Search Purchases..">
                        </form>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                            <thead>
                                <tr class="text-uppercase">
                                    <th class="fw-bold">Product</th>
                                    <th class="d-none d-sm-table-cell fw-bold">Date</th>
                                    <th class="fw-bold">Status</th>
                                    <th class="d-none d-sm-table-cell fw-bold text-end" style="width: 120px;">Price</th>
                                    <th class="fw-bold text-center" style="width: 60px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">iPhone X</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">today</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-warning">Pending..</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $999,99
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">MacBook Pro 15"</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">today</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-warning">Pending..</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $2.299,00
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">Nvidia GTX 1080 Ti</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">today</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-warning">Pending..</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $1200,00
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">Playstation 4 Pro</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">today</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-danger">Cancelled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $399,00
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">Nintendo Switch</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">yesterday</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $349,00
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">iPhone X</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">yesterday</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $999,00
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">Echo Dot</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">yesterday</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $39,99
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">Xbox One X</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-sm text-muted">yesterday</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        $499,00
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Manage">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Purchases -->
            </div>
        </div> --}}
        <!-- END Users and Purchases -->
    </div>
    <!-- END Page Content -->
@endsection
