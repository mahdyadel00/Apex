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
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="user_id">{{ __('dashboard.user_name') }}</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                       placeholder="{{ __('dashboard.user_name') }}"
                                       value="{{ $service->user->user_name }}">
                                @if ($errors->has('user_name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                              <div class="mb-4">
                                <label class="form-label" for="company_id">{{ __('dashboard.company_name') }}</label>
                                <select class="js-select2 form-control" id="company_id" name="company_id"
                                        style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $service->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->data->where('lang_id', $lang_id)->first() != null ?
                                            $company->data->where('lang_id', $lang_id)->first()->name :
                                            $company->data->first()->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="useful">{{ __('dashboard.useful') }}</label>
                                <input type="checkbox" id="useful" name="useful" placeholder="{{ __('dashboard.useful') }}" value="1" {{ $service->useful == 1 ? 'checked' : '' }}>
                                @if ($errors->has('useful'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('useful') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="mb-4">
                                <label class="form-label" for="information">{{ __('dashboard.information') }}</label>
                                <textarea class="form-control" id="information" name="information" placeholder="{{ __('dashboard.information') }}" rows="4">
                                    {!!  $service->information  !!}
                                </textarea>
                                @if ($errors->has('information'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('information') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="information_price">{{ __('dashboard.information_price') }}</label>
                                <input type="text" class="form-control" id="information_price" name="information_price"
                                       placeholder="{{ __('dashboard.information_price') }}"
                                       value="{{ $service->information_price }}">
                                @if ($errors->has('information_price'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('information_price') }}</strong>
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
