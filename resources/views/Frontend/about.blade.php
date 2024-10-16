@extends('layouts.Frontend.master')
@section('content')
    <style>
        .cl-padding {
            padding: 100px 0;
        }
        .fadeInUp h1 
        {
          font-size:25px;
        }
        @media (max-width: 800px) {
            .cl-padding {
                padding: 0 20px;
            }
            .fadeInUp h1 
        {
          font-size:20px;
        }
        }
    </style>


    <div class="container-xxl py-2" style="margin-top:40px;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" style="border-radius: 7px;"
                            src="{{ asset('Front') }}/img/blurred-soft-people-meeting-table-business-people-talking-modern-office-generative-ai.jpg"
                            alt="" style="object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 > {{ $about->data->where('lang_id', $lang_id)->first() != null
                        ? $about->data->where('lang_id', $lang_id)->first()->title
                        : $about->data->first()->title }}
                    </h1>
                    <p class="mb-1" style="line-height: 3; color:black; font-size:15px;">
                        {!! $about->data->where('lang_id', $lang_id)->first() != null
                            ? $about->data->where('lang_id', $lang_id)->first()->description
                            : $about->data->first()->description !!}
                    </p>
                    <a class="btn btn-primary mt-2" style="border-radius: 7px;" href="">
                        {{ __('dashboard.contact_us') }} </a>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-5" style="background-color: #eee;">
        <div class="container-xxl py-2">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100" style="border-radius: 7px;"
                                src="{{ asset('Front') }}/img/nick-morrison-FHnnjk1Yj7Y-unsplash.jpg" alt=""
                                style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp cl-padding" data-wow-delay="0.3s" style="direction:ltr;">
                        <h3> {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                            ? $testimonial->data->where('lang_id', $lang_id)->first()->title
                            : $testimonial->data->first()->title !!} </h3>
                        <p class="mb-1" style="line-height: 2; color:black;">
                            {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                                ? $testimonial->data->where('lang_id', $lang_id)->first()->description
                                : $testimonial->data->first()->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-xxl py-2">
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-6 wow fadeInUp cl-padding" data-wow-delay="0.3s" style="direction:ltr;">
                        <h3> {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                            ? $testimonial->data->where('lang_id', $lang_id)->first()->new_title
                            : $testimonial->data->first()->new_title !!} </h3>
                        <p class="mb-1" style="line-height: 2; color:black;">
                            {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                                ? $testimonial->data->where('lang_id', $lang_id)->first()->new_description
                                : $testimonial->data->first()->new_description !!}
                        </p>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100" style="border-radius: 7px;"
                                src="{{ asset('Front') }}/img/bruce-mars-GzumspFznSE-unsplash.jpg" alt=""
                                style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.Frontend._footer')
@endsection
