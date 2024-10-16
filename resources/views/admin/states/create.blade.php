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
                <h3 class="block-title">{{ __('dashboard.create_state') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.states.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="country_id">{{ __('dashboard.country_name') }}</label>
                                <select class="form-control" id="country_id" name="country_id">
                                    <option value="">{{ __('dashboard.select_country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->data->where('lang_id', $lang_id)->first() != null ? $country->data->where('lang_id', $lang_id)->first()->name : $country->data->first()->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('country_id') }}</strong>
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
@push('js')
    <script type="text/javascript">

    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
</script>
@endpush
