<aside id="side-overlay">
    <!-- Side Header -->
    <div class="bg-image" style="background-image: url('assets/media/various/bg_side_overlay_header.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content-header">
                <!-- User Avatar -->
                <a class="img-link me-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ auth()->user()->image}}"
                        alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ms-2">
                    <a class="text-white fw-semibold" href="javascript:void(0)">{{ auth()->user()->user_name }}</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ms-auto text-white" href="javascript:void(0)" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Content -->
    <form action="db_dark.html" method="POST" onsubmit="return false;">
        <div class="content-side">
            <div class="block pull-x">
                <!-- Personal -->
                <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">{{ __('dashboard.personal') }}</span>
                </div>
                <div class="block-content block-content-full">
                    <div class="mb-4">
                        <label class="form-label">{{ __('dashboard.first_name') }}</label>
                        <input disabled type="text" readonly class="form-control" id="staticEmail"
                            value="{{ auth()->user()->first_name }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-name">{{ __('dashboard.last_name') }}</label>
                        <input disabled type="text" class="form-control" id="so-profile-name" name="so-profile-name"
                            value="{{ auth()->user()->last_name }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-name">{{ __('dashboard.user_name') }}</label>
                        <input disabled type="text" class="form-control" id="so-profile-name" name="so-profile-name"
                            value="{{ auth()->user()->user_name }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-email">{{ __('dashboard.email') }}</label>
                        <input disabled type="email" class="form-control" id="so-profile-email" name="so-profile-email"
                            value="{{ auth()->user()->email }}">
                    </div>
                    {{-- <div class="mb-4">
                        <label class="form-label" for="so-profile-phone">{{ __('dashboard.phone') }}</label>
                        <input disabled type="number" class="form-control" id="so-profile-phone" name="so-profile-phone"
                            value="{{ auth()->user()->phone }}">
                    </div> --}}
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-birth_date">{{ __('dashboard.birth_date') }}</label>
                        <input disabled type="date" class="form-control" id="so-profile-birth_date" name="so-profile-birth_date"
                            value="{{ auth()->user()->birth_date }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-status">{{ __('dashboard.status') }}</label>
                        <input disabled type="checkbox"  id="so-profile-status" name="so-profile-status"
                            {{ auth()->user()->status == 1 ? 'checked' : '' }}>
                    </div>
                </div>
                <!-- END Personal -->

                <!-- Password Update -->
                {{-- <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Password Update</span>
                </div>
                <div class="block-content block-content-full">
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-password">Current Password</label>
                        <input disabled type="password" class="form-control" id="so-profile-password" name="so-profile-password">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-new-password">New Password</label>
                        <input type="password" class="form-control" id="so-profile-new-password"
                            name="so-profile-new-password">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="so-profile-new-password-confirm">Confirm New Password</label>
                        <input type="password" class="form-control" id="so-profile-new-password-confirm"
                            name="so-profile-new-password-confirm">
                    </div>
                </div>
                <!-- END Password Update -->

                <!-- Options -->
                <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Options</span>
                </div>
                <div class="block-content">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="so-settings-status"
                            name="so-settings-status" value="1">
                        <label class="form-check-label" for="so-settings-status">Online Status</label>
                    </div>
                    <p class="text-muted fs-sm w-100">
                        Make your online status visible to other users of your app
                    </p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="so-settings-notifications"
                            name="so-settings-notifications" value="1" checked>
                        <label class="form-check-label" for="so-settings-notifications">Notifications</label>
                    </div>
                    <p class="text-muted fs-sm">
                        Receive desktop notifications regarding your projects and sales
                    </p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="so-settings-updates"
                            name="so-settings-updates" value="1" checked>
                        <label class="form-check-label" for="so-settings-updates">Auto Updates</label>
                    </div>
                    <p class="text-muted fs-sm">
                        If enabled, we will keep all your applications and servers up to date with the most recent
                        features automatically
                    </p>
                </div>
                <!-- END Options --> --}}

                <!-- Submit -->
                {{-- <div class="block-content row justify-content-center border-top">
                    <div class="col-9">
                        <button type="submit" class="btn w-100 btn-alt-primary">
                            <i class="fa fa-fw fa-save opacity-50 me-1"></i> {{ __('dashboard.save') }}
                        </button>
                    </div>
                </div> --}}
                <!-- END Submit -->
            </div>
        </div>
    </form>
    <!-- END Side Content -->
</aside>
