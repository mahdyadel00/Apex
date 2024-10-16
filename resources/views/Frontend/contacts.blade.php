@extends('layouts.Frontend.master')
@section('content')
    <!-- Contact Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ __('dashboard.contact_us') }}</h6>
                <h5 class="mb-5">{{ __('dashboard.contact_for_any_query') }}</h5>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>{{ __('dashboard.contact_us') }}</h5>
                    <p class="mb-4">{!! $setting->data->where('lang_id', $lang_id)->first() != null
                        ? $setting->data->where('lang_id', $lang_id)->first()->description
                        : $setting->data->first()->description !!}</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ __('dashboard.address') }}</h5>
                            <p class="mb-0">{!! $setting->data->where('lang_id', $lang_id)->first() != null
                                ? $setting->data->where('lang_id', $lang_id)->first()->address
                                : $setting->data->first()->address !!}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ __('dashboard.phone') }}</h5>
                            <p class="mb-0">{{ $setting->phone }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ __('dashboard.email') }}</h5>
                            <p class="mb-0">{{ $setting->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                                        style="border-radius: 7px;">
                                    <label for="name">Enter Your Name</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone"
                                        style="border-radius: 7px;">
                                    <label for="subject">Enter Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 150px;border-radius: 7px;"></textarea>
                                    <label for="message">Enter Your Message</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100 py-3" type="submit" style="border-radius: 7px;">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- About End -->
    @include('layouts.Frontend._footer')
@endsection
