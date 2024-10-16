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
                <h3 class="block-title">{{ __('dashboard.create_sector') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.sectors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="state_id">{{ __('dashboard.state_name') }}</label>
                                <select class="form-control" id="state_id" name="state_id">
                                    <option value="">{{ __('dashboard.select_state') }}</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->data->where('lang_id', $lang_id)->first() != null ? $state->data->where('lang_id', $lang_id)->first()->name : $state->data->first()->name }}</option>
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
                                <input type="submit" class="btn btn-primary" value="{{ __('dashboard.create') }}">
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
