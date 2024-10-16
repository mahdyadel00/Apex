@extends('layouts.Frontend.master')

@section('content')
@include('layouts.Frontend._message')
<main>
      <div class="boxing">
        <div class="title"> نظام استب </div>
        <div class="content">
          <form action="{{ route('step_system.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
              <div class="input-box">
                <span class="details">{{ __('front.country') }} </span>
                <select class="select" required="required" name="country_id">
                  <option disabled selected> {{ __('front.country') }}</option>
                  @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->data->first()->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.center_name') }}</span>
                <input name="center_name" type="text" placeholder="{{ __('front.center_name') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.controller_name') }}</span>
                <input name="controller_name" type="text" placeholder="{{ __('front.controller_name') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.lab_name') }}</span>
                <input name="lab_name" type="text" placeholder="{{ __('front.lab_name') }}" required>
              </div>

                <div class="input-box">
                <span class="details"> {{ __('front.id_number') }}</span>
                <input name="id_number" type="text" placeholder="{{ __('front.id_number') }}" required>
              </div>

                <div class="input-box">
                <span class="details"> {{ __('front.name_ar') }}</span>
                <input name="name_ar" type="text" placeholder="{{ __('front.name_ar') }}" required>
              </div>

                <div class="input-box">
                <span class="details"> {{ __('front.name_en') }}</span>
                <input name="name_en" type="text" placeholder="{{ __('front.name_en') }}" required>
              </div>

                <div class="input-box">
                <span class="details"> {{ __('front.grades') }}</span>
                <input name="grades" type="text" placeholder="{{ __('front.grades') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.phone') }} </span>
                <input name="phone" type="text" placeholder="{{ __('front.phone') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.id_number') }} </span>
                <input name="id_number" type="text" placeholder="{{ __('front.id_number') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.id_image') }}</span>
                <input style="padding: 7px;" name="id_image" type="file" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.person_image') }}</span>
                <input style="padding: 7px;" name="person_image" type="file" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.grades') }}</span>
                <input name="grades" type="text" placeholder="{{ __('front.grades') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.notes') }} </span>
                <textarea name="notes" placeholder="{{ __('front.notes') }}" id="" cols="30" rows="10"></textarea>
              </div>
              <div style="margin: 10px 0; width: 100%;">
                <input type="checkbox" onchange="toggleStepa()" id="is_Step_4a" name="">
                <label class="form-label">في حاله Step 4a</label>
              </div>
              <div id="Step_4a" style="display: none;width: 100%;">
                <div class="input-box">
                  <span class="details"> {{ __('front.writing_grade') }}</span>
                  <input name="writing_grade" type="text" placeholder="{{ __('front.writing_grade') }}" required>
                </div>
                <div class="input-box">
                  <span class="details"> {{ __('front.reading_grade') }}</span>
                  <input name="reading_grade" type="text" placeholder=" {{ __('front.reading_grade') }}" required>
                </div>
                <div class="input-box">
                  <span class="details">  {{ __('front.listening_grade') }}</span>
                  <input name="listening_grade" type="text" placeholder="{{ __('front.listening_grade') }}" required>
                </div>
              </div>
              <div style="margin: 10px 0; width: 100%;">
                <input type="checkbox" onchange="toggleStepb()" id="is_Step_4b" name="">
                <label class="form-label">في حاله Step 4b</label>
              </div>
              <div id="Step_4b" style="display: none;width: 100%;">
                <div class="input-box">
                  <span class="details"> {{ __('front.estimates') }}</span>
                  <select class="select" required="required" name="estimates">
                    <option disabled selected>{{ __('front.estimates') }}</option>
                    <option value="fluent">{{__('front.fluent')}}</option>
                    <option value="good">{{__('front.good')}}</option>
                    <option value="acceptable">{{__('front.acceptable')}}</option>
                    <option value="failed">{{__('front.failed')}}</option>
                  </select>
                </div>
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
@push('js')
<script>
      function toggleStepa() {
        var checkbox = document.getElementById("is_Step_4a");
        var StepA = document.getElementById("Step_4a");

        if (checkbox.checked) {
          StepA.style.display = "block";
        } else {
          StepA.style.display = "none";
        }
      }
      function toggleStepb() {
        var checkbox = document.getElementById("is_Step_4b");
        var StepB = document.getElementById("Step_4b");

        if (checkbox.checked) {
          StepB.style.display = "block";
        } else {
          StepB.style.display = "none";
        }
      }
    </script>
@endpush
