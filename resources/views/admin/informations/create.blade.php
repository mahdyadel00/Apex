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
                <h3 class="block-title">{{ __('dashboard.create_information') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.informations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">

                            <div class="mb-4">
                                <label class="form-label" for="lang">{{ __('dashboard.change_lang') }}</label>
                                <select name="lang_id" id="lang_id" class="form-control">
                                    <option>{{ __('dashboard.select_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}">
                                            {{ $lang->code }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('lang_id'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lang_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="{{ __('dashboard.title') }}" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="{{ __('dashboard.image') }}" value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="description">{{ __('dashboard.description') }}</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="{{ __('dashboard.description') }}" value="{{ old('description') }}"></textarea>
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
@push('js')
    <script type="text/javascript">

    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
</script>
@endpush
