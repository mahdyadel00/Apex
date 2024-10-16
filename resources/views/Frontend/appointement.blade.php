@extends('layouts.Frontend.master')

@section('content')
@include('layouts.Frontend._message')
    <main>
        <div class="boxing">
            <div class="title" style="font-size:20px;padding:10px 0;">{{ __('dashboard.what_is_quiz_date') }}?</div>
            <div class="content">
                <form action="{{ route('add-appointement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">{{ __('dashboard.name') }} </span>
                            <input name="name" type="text" placeholder="{{ __('dashboard.name') }}" required>
                        </div>
                        <div class="input-box">
                            <span class="details"> {{ __('dashboard.phone') }}</span>
                            <input name="phone" type="text" placeholder="{{ __('dashboard.phone') }}" required>
                        </div>

                        <div class="input-box">
                            <span class="details">{{ __('dashboard.state_name') }}</span>
                            <select class="select" required="required" name="state_id">
                                <option disabled selected> {{ __('dashboard.state_name') }}</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">
                                        {{ $state->data->where('lang_id', $lang_id)->first() != null
                                            ? $state->data->where('lang_id', $lang_id)->first()->name
                                            : $state->data->first()->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-box" id="center">
                            <span class="details">{{ __('dashboard.centers') }}</span>
                            <select class="select" required="required" name="center_id">
                                <option disabled selected> {{ __('dashboard.center') }}</option>
                                @foreach ($centers as $center)
                                    <option value="{{ $center->id }}">
                                        {{ $center->data->where('lang_id', $lang_id)->first() != null
                                            ? $center->data->where('lang_id', $lang_id)->first()->name
                                            : $center->data->first()->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">{{ __('dashboard.quiz') }}</span>
                            <select class="select" required="required" name="quiz_id">
                                <option disabled selected> {{ __('dashboard.quiz') }}</option>
                                @foreach ($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}">
                                        {{ $quiz->data->where('lang_id', $lang_id)->first() != null
                                            ? $quiz->data->where('lang_id', $lang_id)->first()->name
                                            : $quiz->data->first()->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details"> {{ __('dashboard.date') }}</span>
                            <input name="date" type="date" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <button type="submit" class="btn">{{ __('dashboard.send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

<!-- Footer Start -->
@include('layouts.Frontend._footer')
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('select[name="state_id"]').on('change', function() {
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        url: "{{ URL::to('get-centers') }}/" + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="center_id"]').empty();
                            //in selected state id theb show centers
                            if (data.length > 0) {
                                $('#center').show();
                            } else {
                                $('#center').hide();
                            }
                            $('select[name="center_id"]').append('<option disabled selected> {{ __('dashboard.center') }}</option>');
                            $.each(data, function(key, value) {

                                $('select[name="center_id"]').append('<option value="' +
                                    value.id + '">' + value.data[0].name + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endpush
