@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.upload_certificate') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.students.store_file', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.upload_certificate') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="certificate">{{ __('dashboard.certificate') }}</label>
                                <input type="file" class="form-control" id="certificate" name="certificate"
                                       placeholder="Image Input" accept="certificate/jpeg,certificate/jpg,certificate/png">
                                @foreach ($student->media as $media)
                                    @if($media->name == 'certificate')
                                        <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                                 alt="Student Image">
                                        </a>
                                    @endif
                                @endforeach
                                @if ($errors->has('certificate'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('certificate') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="{{ __('dashboard.upload') }}">
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
