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
                <h3 class="block-title">{{ __('dashboard.add_appointment') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.appointments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">

                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="state_id">{{ __('dashboard.state_name') }}</label>
                                <select class="form-control" name="state_id" id="state_id">
                                    <option disabled selected>{{ __('dashboard.state_name') }}</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">
                                            {{ $state->data->where('lang_id', $lang_id)->first() != null ?
                                            $state->data->where('lang_id', $lang_id)->first()->name :
                                            $state->data->first()->name }}

                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="center_id">{{ __('dashboard.center') }}</label>
                                <select class="form-control" name="center_id" id="center_id">
                                    <option disabled selected>{{ __('dashboard.center') }}</option>
                                    @foreach ($centers as $center)
                                        <option value="{{ $center->id }}">
                                            {{ $center->data->where('lang_id', $lang_id)->first() != null ?
                                            $center->data->where('lang_id', $lang_id)->first()->name :
                                            $center->data->first()->name }}

                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('center_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('center_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="quiz_id">{{ __('dashboard.quiz') }}</label>
                                <select class="form-control" name="quiz_id" id="quiz_id">
                                    <option disabled selected>{{ __('dashboard.quiz') }}</option>
                                    @foreach ($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}">
                                            {{ $quiz->data->where('lang_id', $lang_id)->first() != null ?
                                            $quiz->data->where('lang_id', $lang_id)->first()->name :
                                            $quiz->data->first()->name }}

                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('quiz_id'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('quiz_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('dashboard.name')  }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="{{__('dashboard.phone')}}" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="date">{{ __('dashboard.date') }}</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    placeholder="{{ __('dashboard.date') }}" required>
                                @if ($errors->has('date'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>


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
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
