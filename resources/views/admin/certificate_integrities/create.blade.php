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
                <h3 class="block-title">{{ __('dashboard.add_post') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="category_id">{{ __('dashboard.category') }}</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option disabled selected>{{ __('dashboard.category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->data->where('lang_id', $lang_id)->first() != null ?
                                            $category->data->where('lang_id', $lang_id)->first()->name :
                                            $category->data->first()->name }}

                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="title">{{ __('dashboard.post_name') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="{{ __('dashboard.post_name') }}" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="thumb">{{ __('dashboard.post_image') }}</label>
                                <input type="file" class="form-control" id="thumb" name="thumb"
                                    placeholder="{{ __('dashboard.post_image') }}" value="{{ old('thumb') }}">
                                @if ($errors->has('thumb'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('thumb') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="full_img">{{ __('dashboard.post_cover') }}</label>
                                <input type="file" class="form-control" id="full_img" name="full_img"
                                    placeholder="{{ __('dashboard.post_cover') }}" value="{{ old('full_img') }}">
                                @if ($errors->has('full_img'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('full_img') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="description">{{ __('dashboard.description') }}</label>
                                <textarea class="form-control" id="description" name="description" placeholder="{{ __('dashboard.description') }}" rows="4">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- <div class="mb-4">
                                <label class="form-label" for="is_active">{{ __('dashboard.is_active') }}</label>
                                <input type="checkbox" id="is_active" name="is_active" placeholder="{{ __('dashboard.is_active') }}" value="1">
                                @if ($errors->has('is_active'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
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

