@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_company') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.companies.update_password' , $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">

                            <div class="form-group
                            @if($errors->has('old_password'))
                                is-invalid
                            @endif">
                                <label for="old_password" class="required">{{ __('dashboard.old_password') }}</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="{{ __('dashboard.old_password') }}">
                                @if($errors->has('old_password'))
                                    <div class="invalid-feedback">{{ $errors->first('old_password') }}</div>
                                @endif
                            </div>

                            <div class="form-group
                            @if($errors->has('password'))
                                is-invalid
                            @endif">
                                <label for="password" class="required">{{ __('dashboard.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('dashboard.password') }}">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group
                            @if($errors->has('password_confirmation'))
                                is-invalid
                            @endif">
                                <label for="password_confirmation" class="required">{{ __('dashboard.password_confirmation') }}</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('dashboard.password_confirmation') }}">
                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="{{ __('dashboard.edit') }}">
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

