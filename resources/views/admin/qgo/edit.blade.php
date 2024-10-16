@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_qgo') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.qgos.update', $qgo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="first_name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $qgo->name }}" placeholder="{{ __('dashboard.name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email" value="{{ $qgo->email }}"
                                       name="email" placeholder="{{ __('dashboard.email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="{{ $qgo->phone }}" placeholder="{{ __('dashboard.phone') }}">
                                @if ($errors->has('hone'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hone') }}</strong>
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
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
