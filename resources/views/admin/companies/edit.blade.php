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
                <form action="{{ route('admin.companies.update' , $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="name">{{ __('dashboard.company_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('dashboard.company_name') }}" value="{{ $company->data->where('lang_id', $lang_id)->first() != null? $company->data->where('lang_id', $lang_id)->first()->name : $company->data->first()->name }}">
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
                                        <option value="{{ $sector->id }}" {{ $company->sector_id == $sector->id ? 'selected' : '' }}>{{ $sector->data->where('lang_id', $lang_id)->first() != null ? $sector?->data->where('lang_id', $lang_id)->first()->name : $sector?->data->first()->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sector_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('sector_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="email">{{ __('dashboard.company_email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('dashboard.company_email') }}" value="{{ $company->email }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="phone">{{ __('dashboard.company_phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('dashboard.company_phone') }}" value="{{ $company->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="logo">{{ __('dashboard.logo') }}</label>
                                <input type="file" class="form-control" id="logo" name="logo" placeholder="{{ __('dashboard.company_cover') }}" value="{{ old('logo') }}">
                                @foreach ($company->media as $media)
                                    <img src="{{ asset("storage/" . $media->path) }}" width="50px" height="50px"
                                         alt="{{ $company->title }}" class="img-thumbnail" style="margin: 10px"/>
                                @endforeach
                                @if ($errors->has('logo'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
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

