@extends('layouts.Frontend.master')

@section('content')
@include('layouts.Frontend._message')
  
<div class=content>
    <div class="wrapper-1">
      <div class="wrapper-2">
        <h1>قياس مصر</h1>
        <img src="{{ asset('Front') }}/img/logo1.png" width="120px" height="60px" alt="logo">
        <p>برجاء ارسال رساله والتواصل معانا</p>
        <div class="go-home">
        <a href="{{ route('contact') }}"> {{ __('dashboard.contact_us') }}</a>
        </div>
      </div>
    </div>
</div>

<!-- Footer Start -->
@include('layouts.Frontend._footer')
@endsection

