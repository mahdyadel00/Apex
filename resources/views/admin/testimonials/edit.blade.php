@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_testimonial') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    @include('layouts.admin._message')
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="lang">{{ __('dashboard.change_lang') }}</label>
                                <select name="lang_id" id="lang_id" class="form-control">
                                    <option disabled selected>{{ __('dashboard.change_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{ $testimonial->data->first()->lang_id == $lang->id ? 'selected' : '' }}>
                                            {{ $lang->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $testimonial->data->first()->title }}" placeholder="Name">
                                @if ($errors->has('title'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                              <div class="mb-4">
                                <label class="form-label" for="new_title">{{ __('dashboard.new_title') }}</label>
                                <input type="text" class="form-control" id="new_title" name="new_title"
                                    value="{{ $testimonial->data->first()->new_title }}"
                                    placeholder="Name">
                                @if ($errors->has('new_title'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea type="text" class=" ckeditor  form-control" id="description" name="description" placeholder="Whatsapp Input">
                                    {!! $testimonial->data->first()->description !!}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="new_description">{{ __('dashboard.new_description') }}</label>
                                <textarea type="text" class=" ckeditor  form-control" id="new_description" name="new_description" placeholder="Whatsapp Input">
                                    {!!$testimonial->data->first()->new_description !!}
                                </textarea>
                                @if ($errors->has('new_description'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image"
                                    value="{{ $testimonial->image }}" name="image" placeholder="{{ __('dashboard.image') }}"
                                    accept="image/jpeg,image/jpg,image/png">
                                    @foreach ($testimonial->media as $media)
                                        @if($media->name =='image')
                                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                                 alt="{{ $testimonial->data->isNotEmpty() ? $testimonial->data->first()->name : ''  }}"
                                                 class="img-thumbnail" style="margin: 10px"/>
                                        @endif
                                    @endforeach
                                @if ($errors->has('image'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="image_achievements">{{ __('dashboard.image_achievements') }}</label>
                                <input type="file" class="form-control" id="image_achievements"
                                    value="{{ $testimonial->image_achievements }}" name="image_achievements" placeholder="{{ __('dashboard.image_achievements') }}"
                                    accept="image_achievements/jpeg,image_achievements/jpg,image_achievements/png">
                                    @foreach ($testimonial->media as $media)
                                        @if($media && $media->name =='image_achievements')
                                        <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                             alt="{{ $testimonial->data->isNotEmpty() ? $testimonial->data->first()->name : ''  }}"
                                             class="img-thumbnail" style="margin: 10px"/>
                                        @endif
                                    @endforeach
                                @if ($errors->has('image_achievements'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_achievements') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="status">{{ __('dashboard.status') }}</label>
                                <input type="checkbox" id="status" name="status" placeholder="{{ __('dashboard.status') }}
                                    " value="1"
                                    {{ $testimonial->status == 1 ? 'checked' :'' }}>
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
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
