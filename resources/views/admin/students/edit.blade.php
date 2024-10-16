@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_student') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="first_name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $student->name }}" placeholder="{{ __('dashboard.name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email" value="{{ $student->email }}"
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
                                       value="{{ $student->phone }}" placeholder="{{ __('dashboard.phone') }}">
                                @if ($errors->has('hone'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                       placeholder="Image Input" accept="image/jpeg,image/jpg,image/png">
                                @foreach ($student->media as $media)
                                    <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                         alt="{{ $student->first_name }}" class="img-thumbnail" style="margin: 10px"/>
                                @endforeach
                                @if ($errors->has('image'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
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
