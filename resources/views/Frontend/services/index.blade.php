<style>
    .plus{
        display: flex;
        justify-content: end;
        margin: 10px 0;
    }
    .plus-btn
    {
        padding: 15px 10px;
        color: #fff;
        background-color:royalblue;
        border:none;
        border-radius: 7px;
        width: 70px;
    }
</style>
@extends('layouts.Frontend.master')

@section('content')
    @include('layouts.Frontend._message')
    <main>
        <div class="boxing">
            <div class="title" style="font-size:20px;padding:10px 0;">{{ __('front.sell_your_information') }}</div>
            <div class="content">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">{{ __('dashboard.country_name') }}</span>
                            <select class="select" required="required" name="country_id">
                                <option disabled selected> {{ __('dashboard.country_name') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->data->where('lang_id', $lang_id)->first() != null
                                            ? $country->data->where('lang_id', $lang_id)->first()->name
                                            : $country->data->first()->name }}
                                    </option>
                                @endforeach
                            </select>
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

                        <div class="input-box">
                            <span class="details">{{ __('dashboard.sector_name') }}</span>
                            <select class="select" required="required" name="sector_id">
                                <option disabled selected> {{ __('dashboard.sector_name') }}</option>
                                @foreach ($sectors as $sector)
                                    <option value="{{ $sector->id }}">
                                        {{ $sector->data->where('lang_id', $lang_id)->first() != null
                                            ? $sector->data->where('lang_id', $lang_id)->first()->name
                                            : $sector->data->first()->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                         <div class="input-box">
                            <span class="details">{{ __('dashboard.company_name') }}</span>
                            <select class="select" required="required" name="company_id">
                                <option disabled selected> {{ __('dashboard.company_name') }}</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">
                                        {{ $company->data->where('lang_id', $lang_id)->first() != null
                                            ? $company->data->where('lang_id', $lang_id)->first()->name
                                            : $company->data->first()->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-box" style="display: flex; flex-wrap: wrap; width: 100%;justify-content: space-between;align-items: center;">
                            <div style="width: 90%;">
                                <span class="details"> {{ __('front.information') }}</span>
                                <input name="information[]" type="text" placeholder="{{ __('front.information') }}" required>
                            </div>
                            <div>
                                <button type="button" class="plus-btn" id="remove" style="background-color: red;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                        <div class="plus">
                            <button type="button" class="plus-btn" id="add">
                                <i class="fas fa-plus"></i>
                            </button>
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
        //repaet input information when click on add button
        $(document).ready(function() {
            $('#add').click(function() {
                var html = '';
                html += '<div class="input-box" style="display: flex; flex-wrap: wrap; width: 100%;justify-content: space-between;align-items: center;">';
                html += '<div style="width: 90%;">';
                html += '<span class="details"> {{ __('front.information') }}</span>';
                html += '<input name="information[]" type="text" placeholder="{{ __('front.information') }}" required>';
                html += '</div>';
                html += '<div>';
                html += '<button type="button" class="plus-btn" id="remove" style="background-color: red;">';
                html += '<i class="fas fa-trash"></i>';
                html += '</button>';
                html += '</div>';
                html += '</div>';
                $('.user-details').append(html);
            });
            $(document).on('click', '#remove', function() {
                $(this).closest('.input-box').remove();
            });
        });
        //when select country, get states of this country
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_id = $(this).val();

                if (country_id) {
                    $.ajax({
                        url: "{{ url('get-states') }}/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="state_id"]').empty();
                            $.each(data, function(key, value1) {
                                $.each(value1.data, function(key, value) {
                                    $('select[name="state_id"]').append('<option value="' + value1.id + '">' + value.name + '</option>');
                                });
                            });
                        },
                    });
                } else {
                $('select[name="state_id"]').empty();
            }
        });
    });

        //when select state, get cities of this state
        $(document).ready(function() {
            $('select[name="state_id"]').on('change', function() {
                var state_id = $(this).val();

                if (state_id) {
                    $.ajax({
                        url: "{{ url('get-sectors') }}/" + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sector_id"]').empty();
                            $.each(data, function(key, value2) {
                                $.each(value2.data, function(key, value) {
                                    console.log(value2.id, value.name)
                                    $('select[name="sector_id"]').append('<option value="' + value2.id + '">' + value.name + '</option>');
                                });
                            });
                        },
                    });
                } else {
                    $('select[name="sector_id"]').empty();
                }
            });
        });

        //when select sector, get companies of this sector
        $(document).ready(function() {
            $('select[name="sector_id"]').on('change', function() {
                var sector_id = $(this).val();

                if (sector_id) {
                    $.ajax({
                        url: "{{ url('get-companies') }}/" + sector_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="company_id"]').empty();
                            $.each(data, function(key, value) {
                                $.each(value.data, function(key, value) {
                                    // console.log(value.id, value.name)
                                    $('select[name="company_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            });
                        },
                    });
                } else {
                    $('select[name="company_id"]').empty();
                }
            });
        });

    </script>
@endpush
