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
                <h3 class="block-title">{{ __('dashboard.create_center') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.centers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="state_id">{{ __('dashboard.state_name') }}</label>
                                <select class="js-select2 form-control" id="state_id" name="state_id" style="width: 100%;" data-placeholder="Choose one.." required>
                                    <option></option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->data->where('lang_id', $lang_id)->first() != null?
                                            $state->data->where('lang_id', $lang_id)->first()->name :
                                            $state->data->first()->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>

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
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea class="form-control" id="description" name="description" placeholder="{{ __('dashboard.description') }}" rows="4">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="is_active">{{ __('dashboard.is_active') }}</label>
                                <input type="checkbox" id="is_active" name="is_active" placeholder="{{ __('dashboard.is_active') }}" value="1">
                                @if ($errors->has('is_active'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('is_active') }}</strong>
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

