@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_service') }}</h3>
            </div>
        @include('layouts.admin._message')
            <div class="block-content">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">

                            <div class="mb-4">
                                <label class="form-label" for="lang_id">{{ __('dashboard.select_language') }}</label>
                                <select class="form-control" id="lang_id" name="lang_id">
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                                @if ($service->data->where('lang_id', $language->id)->first() != null) selected @endif>
                                            {{ $language->code }}</option>
                                    @endforeach
                                </select>
                                @error('lang_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="{{ __('dashboard.title') }}" value="{{ $service->data->where('lang_id', $lang_id)->first() != null ? $service->data->where('lang_id', $lang_id)->first()->title : $service->data->first()->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                              <div class="mb-4">
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="{{ __('dashboard.description') }}" rows="4">{!! $service->data->where('lang_id', $lang_id)->first() != null ? $service->data->where('lang_id', $lang_id)->first()->description : $service->data->first()->description !!}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="service_image">{{ __('dashboard.service_image') }}</label>
                                <input type="file" class="form-control" id="service_image" name="service_image">
                                @error('service_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @foreach ($service->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}"
                                        class="img-thumbnail" style="width: 100px; height: 100px;">
                                @endforeach
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
