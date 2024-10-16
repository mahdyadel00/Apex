@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_slider') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="lang">{{ __('dashboard.change_lang') }}</label>
                                <select name="lang_id" id="lang_id" class="form-control">
                                    <option disabled value="">{{ __('dashboard.select_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}">{{ $lang->code }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('lang_id'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lang_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="{{ __('dashboard.title') }}" value="
                                        {{ $slider->data->where('lang_id', $lang_id)->first() != null?
                                $slider->data->where('lang_id', $lang_id)->first()->title :
                                $slider->data->first()->title }}
                                ">
                                @if ($errors->has('title'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea type="text" class="form-control ckeditor" id="description" name="description"
                                          placeholder="{{  __('dashboard.description') }}">
                                    {!! $slider->data->where('lang_id', $lang_id)->first() != null?
                                $slider->data->where('lang_id', $lang_id)->first()->description :
                                $slider->data->first()->description !!}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                       placeholder="{{ __('dashboard.image') }}"
                                       accept="image/jpeg,image/jpg,image/png">
                                @foreach($slider->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}" alt="
                                     {{ $slider->data->where('lang_id', $lang_id)->first() != null?
                                $slider->data->where('lang_id', $lang_id)->first()->title :
                                $slider->data->first()->title }}" width="100px" height="100px" class="img-thumbnail" style="margin: 10px"/>
                                @endforeach
                                @if ($errors->has('image'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="status">{{ __('dashboard.status') }}</label>
                                <input type="checkbox" id="status" name="status" placeholder="{{ __('dashboard.status') }}
                                    " value="1"
                                    {{ $slider->status == 1 ? 'checked' :'' }}>
                                @if ($errors->has('status'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
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
