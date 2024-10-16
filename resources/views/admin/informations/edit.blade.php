@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_information') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.informations.update', $information->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            @include('layouts.admin._message')
                            <div class="mb-4">
                                <label class="form-label" for="lang">{{ __('dashboard.change_lang') }}</label>
                                <select name="lang_id" id="lang_id" class="form-control">
                                    <option disabled value="">{{ __('dashboard.select_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{ $information->data->first()->lang_id == $lang->id ? 'selected' : '' }}>
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
                                <label class="form-label" for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="{{ __('dashboard.title') }}"
                                       value="{{ $information->data->first()->title }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea class="form-control" id="description" name="description"
                                          placeholder="{{ __('dashboard.description') }}">{{ $information->data->first()->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image"
                                       value="{{ $information->image }}" name="image" placeholder="{{ __('dashboard.image') }}"
                                       accept="image/jpeg,image/jpg,image/png">
                                @foreach ($information->media as $media)
                                    @if($media->name =='image')
                                        <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                             alt="{{ $information->data->isNotEmpty() ? $information->data->first()->name : ''  }}"
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
                                <label class="form-label" for="is_active">{{ __('dashboard.is_active') }}</label>
                                <input type="checkbox" id="is_active" name="is_active"
                                       placeholder="{{ __('dashboard.is_active') }}}}"
                                       value="1"
                                    {{ $information->is_active == 1 ? 'checked' : '' }}>
                                @if ($errors->has('is_active'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('is_active') }}</strong>
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
