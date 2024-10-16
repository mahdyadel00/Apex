@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.create_user') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="first_name">{{ __('dashboard.first_name') }}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" value="{{ old('first_name') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="last_name">{{ __('dashboard.last_name') }}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name" value="{{ old('last_name') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="user_name">{{ __('dashboard.user_name') }}</label>
                                <input type="text" class="form-control" id="name" name="user_name"
                                    placeholder="User Name" value="{{ old('user_name') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Emai Input" value="{{ old('email') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password">{{ __('dashboard.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password Input" value="{{ old('password') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label"
                                    for="password_confirmation">{{ __('dashboard.confirmation_password') }}</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Password confirmation Input" value="{{ old('password_confirmation') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="birth_date">{{ __('dashboard.birth_date') }}</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    placeholder="BirthDate Input" value="{{ old('birth_date') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="Image Input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="status">{{ __('dashboard.status') }}</label>
                                <input type="checkbox" id="status" name="status" placeholder="Status Input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="roles_name">{{ __('dashboard.roles') }}</label>
                                <select name="roles_name[]" id="roles" class="form-control js-example-basic-multiple"
                                    multiple="multiple">
                                    <option disabled value="0">Select Roles</option>
                                    @foreach ($roles as $role)
                                        <option>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="Create">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Elements -->
    </div>
    <!-- END Page Content -->
@endsection
