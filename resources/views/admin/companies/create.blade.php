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
                <h3 class="block-title">{{ __('dashboard.add_company') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="name">{{ __('dashboard.company_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('dashboard.company_name') }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="sector_id">{{ __('dashboard.sector_name') }}</label>
                                <select class="form-control" id="sector_id" name="sector_id">
                                    <option disabled selected>{{ __('dashboard.select_sector') }}</option>
                                    @foreach ($sectors as $sector)
                                        <option value="{{ $sector->id }}">{{ $sector?->data->where('lang_id', $lang_id)->first() != null ?
                                            $sector?->data->where('lang_id', $lang_id)->first()->name :
                                            $sector?->data->first()->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sector_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('sector_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="type">{{ __('dashboard.company_type') }}</label>
                                <select class="form-control" id="type" name="type">
                                    <option disabled selected>{{ __('dashboard.select_type') }}</option>
                                    <option value="step">{{ __('dashboard.step') }}</option>
                                    <option value="student">{{ __('dashboard.student') }}</option>
                                    <option value="certificate">{{ __('dashboard.certificate') }}</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="email">{{ __('dashboard.company_email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="{{ __('dashboard.company_email') }}" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="phone">{{ __('dashboard.company_phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{ __('dashboard.company_phone') }}" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="password">{{ __('dashboard.company_password') }}</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="{{ __('dashboard.company_password') }}" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="password_confirmation">{{ __('dashboard.password_confirmation') }}</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                    placeholder="{{ __('dashboard.password_confirmation') }}" value="{{ old('password_confirmation') }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="mb-4">
                                <label class="form-label required" for="logo">{{ __('dashboard.logo') }}</label>
                                <input type="file" class="form-control" id="logo" name="logo"
                                    placeholder="{{ __('dashboard.company_cover') }}" value="{{ old('logo') }}">
                                @if ($errors->has('logo'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="{{ __('dashboard.create') }}">
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

