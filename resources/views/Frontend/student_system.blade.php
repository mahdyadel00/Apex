@extends('layouts.Frontend.master')

@section('content')
@include('layouts.Frontend._message')
<main>
      <div class="boxing">
        <div class="title"> {{ __('front.student_system') }} </div>
        <div class="content">
            <form action="{{ route('student_system.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
              <div class="input-box">
                    <span class="details"> {{ __('front.education_name') }}</span>
                    <input name="education_name" type="text" placeholder="{{ __('front.education_name') }}" required>
              </div>
              <div class="input-box">
                    <span class="details"> {{ __('front.person_name') }}</span>
                    <input name="person_name" type="text" placeholder="{{ __('front.person_name') }}" required>
              </div>

              <div class="input-box">
                    <span class="details"> {{ __('front.person_phone') }}</span>
                    <input name="person_phone" type="text" placeholder="{{ __('front.person_phone') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.band_name') }}</span>
                <input name="band_name" type="text" placeholder="{{ __('front.band_name') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.ranking') }}</span>
                <input name="ranking" type="text" placeholder="{{ __('front.ranking') }}" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.grading_data') }} </span>
                <input name="grading_data" type="text" placeholder="{{ __('front.grading_data') }}" required>
              </div>
              <div class="input-box">
                <span class="details"> {{ __('front.person_image') }}</span>
                <input style="padding: 7px;" name="person_image" type="file" required>
              </div>
              <div class="input-box">
                <span class="details">{{ __('front.school_logo') }}</span>
                <input style="padding: 7px;" name="school_logo" type="file" required>
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

