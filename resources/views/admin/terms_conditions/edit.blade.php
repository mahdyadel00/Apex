@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_terms_condition') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.terms_conditions.update', $terms_condition->id) }}" method="POST"
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
                                    <option value="">{{ __('dashboard.select_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{ $terms_condition->data->first()->lang_id == $lang->id ? 'selected' : '' }}>
                                            {{ $lang->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ $terms_condition->data->where('lang_id', $lang_id)->first() != null?
                                $terms_condition->data->where('lang_id', $lang_id)->first()->title :
                                $terms_condition->data->first()->title }}"
                                       placeholder="Name">
                                @if ($errors->has('title'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea type="text" class=" ckeditor  form-control" id="description"
                                          name="description" placeholder="{{ __('dashboard.description')}}">
                                {!! $terms_condition->data->where('lang_id', $lang_id)->first() != null?
                           $terms_condition->data->where('lang_id', $lang_id)->first()->description :
                           $terms_condition->data->first()->description !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image"
                                       value="{{ $terms_condition->image }}" name="image"
                                       placeholder="{{ __('dashboard.image') }}"
                                       accept="image/jpeg,image/jpg,image/png">
                                @foreach ($terms_condition->media as $media)
                                    <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                         alt="{{ $terms_condition->data->isNotEmpty() ? $terms_condition->data->first()->name : ''  }}"
                                         class="img-thumbnail" style="margin: 10px"/>
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
                                    {{ $terms_condition->status == 1 ? 'checked' :'' }}>
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
