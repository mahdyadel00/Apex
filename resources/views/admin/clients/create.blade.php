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
                <h3 class="block-title">{{ __('dashboard.create_client') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.clients.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{ __('dashboard.name') }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="email">{{ __('dashboard.email') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="{{ __('dashboard.email') }}" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="{{ __('dashboard.phone') }} " value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="password">{{ __('dashboard.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="{{ __('dashboard.password') }}" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required"
                                       for="password_confirmation">{{ __('dashboard.password_confirmation') }}</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="{{ __('dashboard.password_confirmation') }}" value="{{ old('password_confirmation') }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="address">{{ __('dashboard.address') }}</label>
                                <textarea type="text" class="form-control ckeditor" id="address" name="address"
                                          placeholder="Address Input">{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                       placeholder="image Input" accept="image/jpeg,image/jpg,image/png">
                                @if ($errors->has('image'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="is_approved">{{ __('dashboard.is_approved') }}</label>
                                <input type="checkbox" id="is_approved" name="is_approved" value="1"
                                       placeholder="is_approved Input">
                                @if ($errors->has('is_approved'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_approved') }}</strong>
                                    </span>
                                @endif
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
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
