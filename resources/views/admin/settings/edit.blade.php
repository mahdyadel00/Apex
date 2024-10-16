@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_setting') }}</h3>
            </div>
            <div class="block-content">
                @include('layouts.admin._message')
                <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST"
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
                                    <option value="">{{ __('dashboard.select_lang') }}</option>
                                    @foreach ($languags as $lang)
                                        <option value="{{ $lang->id }}"
                                                {{ $lang->id == $lang_id ? 'selected' : '' }}>{{ $lang->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('lang_id'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lang_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $setting->data->where('lang_id', $lang_id)->first() != null?
                                $setting->data->where('lang_id', $lang_id)->first()->name : $setting->data->first()->name }}" placeholder="{{ __('dashboard.name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email" value="{{ $setting->email }}"
                                       name="email" placeholder="{{ __('dashboard.email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="facebook">{{ __('dashboard.facebook') }}</label>
                                <input type="text" class="form-control" id="facebook" value="{{ $setting->facebook }}"
                                       name="facebook" placeholder="{{ __('dashboard.facebook') }}">
                                @if ($errors->has('facebook'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="twitter">{{ __('dashboard.twitter') }}</label>
                                <input type="text" class="form-control" id="twitter" value="{{ $setting->twitter }}"
                                       name="twitter" placeholder="{{ __('dashboard.twitter') }}">
                                @if ($errors->has('twitter'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="instagram">{{ __('dashboard.instagram') }}</label>
                                <input type="text" class="form-control" id="instagram" value="{{ $setting->instagram }}"
                                       name="instagram" placeholder="{{ __('dashboard.instagram') }}">
                                @if ($errors->has('instagram'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="youtube">{{ __('dashboard.youtube') }}</label>
                                <input type="text" class="form-control" id="youtube" value="{{ $setting->youtube }}"
                                       name="youtube" placeholder="{{ __('dashboard.youtube') }}">
                                @if ($errors->has('youtube'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="number" class="form-control" id="phone" value="{{ $setting->phone }}"
                                       name="phone" placeholder="{{ __('dashboard.phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phone_2">{{ __('dashboard.phone_2') }}</label>
                                <input type="number" class="form-control" id="phone_2"
                                       value="{{ $setting->phone_2 }}" name="phone_2"
                                       placeholder="{{ __('dashboard.phone_2') }}">
                                @if ($errors->has('phone_2'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="whats_app">{{ __('dashboard.whats_app') }}</label>
                                <input type="number" class="form-control" id="whats_app"
                                       value="{{ $setting->whats_app }}" name="whats_app"
                                       placeholder="{{ __('dashboard.whatsapp') }}">
                                @if ($errors->has('whats_app'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('whats_app') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="address">{{ __('dashboard.address') }}</label>
                                <textarea type="text" class="form-control ckeditor" id="address" name="address"
                                          placeholder="{{ __('dashboard.address') }}">
                                    {!!  $setting->data->where('lang_id', $lang_id)->first() != null?
                                $setting->data->where('lang_id', $lang_id)->first()->address :
                                $setting->data->first()->address !!}
                                </textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="description">{{ __('dashboard.description') }}</label>
                                <textarea type="text" class=" ckeditor  form-control" id="description" name="description"
                                          placeholder="{{ __('dashboard.description') }}">
                                    {!! $setting->data->where('lang_id', $lang_id)->first() != null?
                                $setting->data->where('lang_id', $lang_id)->first()->description :
                                $setting->data->first()->description !!}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- <div class="mb-4">
                                <label class="form-label"
                                       for="km_price">{{ __('dashboard.km_price') }}</label>
                                <input type="text" class="form-control" id="km_price"
                                       value="{{ $setting->km_price }}" name="km_price"
                                       placeholder="{{ __('dashboard.km_price') }}">
                                @if ($errors->has('km_price'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('km_price') }}</strong>
                                    </span>
                                @endif
                            </div> --}}

                            <div class="mb-4">
                                <label class="form-label"
                                       for="working_hours_from">{{ __('dashboard.working_hours_from') }}</label>
                                <input type="time" class="form-control" id="working_hours_from"
                                       value="{{ $setting->working_hours_from }}" name="working_hours_from"
                                       placeholder="{{ __('dashboard.working_hours_from') }}">
                                @if ($errors->has('working_hours_from'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('working_hours_from') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label"
                                       for="working_hours_to">{{ __('dashboard.working_hours_to') }}</label>
                                <input type="time" class="form-control" id="working_hours_to"
                                       value="{{ $setting->working_hours_to }}" name="working_hours_to"
                                       placeholder="{{ __('dashboard.working_hours_to') }}">
                                @if ($errors->has('working_hours_to'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('working_hours_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="logo">{{ __('dashboard.logo') }}</label>
                                <input type="file" class="form-control" id="logo" value="{{ $setting->logo }}"
                                       name="logo" placeholder="{{ __('dashboard.logo') }}"
                                       accept="image/jpeg,image/jpg,image/png">
                                @foreach($setting->media as $media)
                                    <img style="width: 150px" id="setting_logo" class="img-thumbnail"
                                         src="{{ asset("storage/". $media->path ) }}">
                                @endforeach
                                @if ($errors->has('logo'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="favicon">{{ __('dashboard.favicon') }}</label>
                                <input type="file" class="form-control" id="favicon"
                                       value="{{ $setting->favicon }}" name="favicon"
                                       placeholder="{{ __('dashboard.favicon') }} }}"
                                       accept="image/jpeg,image/jpg,image/png">
                                @foreach($setting->media as $media)
                                    <img style="width: 150px" id="setting_logo" class="img-thumbnail"
                                         src="{{ asset("storage/". $media->path ) }}">
                                @endforeach
                                @if ($errors->has('favicon'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('favicon') }}</strong>
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
