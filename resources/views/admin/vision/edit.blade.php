@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_about') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.visions.update', $vision->id) }}" method="POST"
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
                                    <option readonly selected>{{ __('dashboard.change_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{ $vision->data->first()->lang_id == $lang->id ? 'selected' : '' }}>
                                            {{ $lang->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="training_courses">{{ __('dashboard.training_courses') }}</label>
                                <textarea type="text" class=" ckeditor  form-control" id="training_courses" name="training_courses" placeholder="Whatsapp Input">
                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null?
                                $vision->data->where('lang_id', $lang_id)->first()->training_courses :
                                $vision->data->first()->training_courses !!}
                                </textarea>
                                @if ($errors->has('training_courses'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('training_courses') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="quality_policy">{{ __('dashboard.quality_policy') }}</label>
                                <textarea type="text" class="ckeditor form-control" id="quality_policy" name="quality_policy" placeholder="Whatsapp Input">
                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null?
                                $vision->data->where('lang_id', $lang_id)->first()->quality_policy :
                                $vision->data->first()->quality_policy !!}
                                </textarea>
                                @if ($errors->has('title'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="social_responsibility">{{ __('dashboard.social_responsibility') }}</label>
                                <textarea type="text" class="ckeditor form-control" id="social_responsibility" name="social_responsibility" placeholder="Whatsapp Input">
                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null?
                                $vision->data->where('lang_id', $lang_id)->first()->social_responsibility :
                                $vision->data->first()->social_responsibility !!}
                                </textarea>
                                @if ($errors->has('social_responsibility'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('social_responsibility') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="communication">{{ __('dashboard.communication') }}</label>
                                <textarea type="text" class="ckeditor form-control" id="communication" name="communication" placeholder="Whatsapp Input">
                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null?
                                $vision->data->where('lang_id', $lang_id)->first()->communication :
                                $vision->data->first()->communication !!}
                                </textarea>
                                @if ($errors->has('communication'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('communication') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="status">{{ __('dashboard.status') }}</label>
                                <input type="checkbox" id="status" name="status" placeholder="{{ __('dashboard.status') }}
                                    " value="1"
                                    {{ $vision->status == 1 ? 'checked' :'' }}>
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
