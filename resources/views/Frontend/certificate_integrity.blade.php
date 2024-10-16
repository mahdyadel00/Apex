@extends('layouts.Frontend.master')

@section('content')
@include('layouts.Frontend._message')
<main>
      <div class="boxing">
        <div class="title"> شهاده النزاهه </div>
        <div class="content">
          <form action="{{ route('certificate_integrity.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
              <div class="input-box">
                <span class="details">{{ __('front.country') }}</span>
                <select class="select" required="required" name="country_id">
                  <option disabled selected>{{ __('front.country') }}</option>
                 @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->data->first()->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.company_name') }}</span>
                <input name="company_name" type="text" placeholder="{{ __('front.company_name') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.company_address') }}</span>
                <input name="company_address" type="text" placeholder="{{ __('front.company_address') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.manager_name') }}</span>
                <input name="manager_name" type="text" placeholder="{{ __('front.manager_name') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.person_name') }}</span>
                <input name="person_name" type="text" placeholder="{{ __('front.person_name') }}" required>
              </div>

                <div class="input-box">
                <span class="details">{{ __('front.person_email') }}</span>
                <input name="person_email" type="text" placeholder="{{ __('front.person_email') }}" required>
              </div>
                <div class="input-box">
                <span class="details">{{ __('front.person_phone') }}</span>
                <input name="person_phone" type="text" placeholder="{{ __('front.person_phone') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.id_number') }}</span>
                <input name="id_number" type="text" placeholder="{{ __('front.id_number') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.gscore') }}</span>
                <input name="gscore" type="text" placeholder=" {{ __('front.gscore') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.country_destination') }}</span>
                <input name="country_destination" type="text" placeholder="{{ __('front.country_destination') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.destination_port') }} </span>
                <input name="destination_port" type="text" placeholder="{{ __('front.destination_port') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.image') }}</span>
                <input style="padding: 7px;" name="image" type="file" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.notes') }}</span>
                <textarea name="notes" placeholder="{{ __('front.notes') }}" id="" cols="30" rows="10"></textarea>
              </div>
            </div>

            <div class="input-box">
              <button type="submit" class="btn">{{ __('front.save') }}</button>
            </div>
          </form>
        </div>
      </div>
</main>

<!-- Footer Start -->
@include('layouts.Frontend._footer')
@endsection

