@extends('layouts.Frontend.master')

@section('content')
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('front.services') }}</h2>
                <h3 class="section-subheading text-muted">{{ __('front.services_description') }}</h3>
            </div>
            <div class="row text-center">
                @foreach($services as $service)
                    <div class="col-md-3">
                        <span class="fa-stack fa-4x">
                            @foreach ($service->media as $media)
                                <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}"
                                     class="img-thumbnail" style="width: 100px; height: 100px;">
                            @endforeach
                        </span>
                        <h4 class="my-3">
                            {{ $service->data->where('lang_id', $lang_id)->first() != null?
                                $service->data->where('lang_id', $lang_id)->first()->title :
                                $service->data->first()->title }}
                        </h4>
                        <p class="text-muted">
                                {{ $service->data->where('lang_id', $lang_id)->first() != null?
                                $service->data->where('lang_id', $lang_id)->first()->description :
                                $service->data->first()->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('front.portfolio') }}</h2>
                <h3 class="section-subheading text-muted">{{ __('front.portfolio_description') }}</h3>
            </div>
            <div class="row">
                @foreach($our_business as $business)
                    <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            @foreach ($business->media as $media)
                                <img class="img-fluid" src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}" />
                            @endforeach
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">
                                {{ $business->data->where('lang_id', $lang_id)->first() != null?
                                $business->data->where('lang_id', $lang_id)->first()->title :
                                $business->data->first()->title }}
                            </div>
                            <div class="portfolio-caption-subheading text-muted">
                                {{ $business->data->where('lang_id', $lang_id)->first() != null?
                                $business->data->where('lang_id', $lang_id)->first()->description :
                                $business->data->first()->description }}
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('front.about') }}</h2>
                <h3 class="section-subheading text-muted">{{ __('front.about_description') }}</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('Front') }}/assets/img/about/1.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">
                                {{ $about->data->where('lang_id', $lang_id)->first() != null?
                                    $about->data->where('lang_id', $lang_id)->first()->title :
                                    $about->data->first()->title }}
                            </h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">
                            {!! $about->data->where('lang_id', $lang_id)->first() != null?
                                $about->data->where('lang_id', $lang_id)->first()->description :
                                $about->data->first()->description !!}
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('Front') }}/assets/img/about/2.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ __('front.history_and_establishment') }}</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">
                            {!! $about->data->where('lang_id', $lang_id)->first() != null?
                                $about->data->where('lang_id', $lang_id)->first()->history :
                                $about->data->first()->history !!}
                            </p></div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('Front') }}/assets/img/about/3.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ __('front.objectives') }}</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">
                            {!! $about->data->where('lang_id', $lang_id)->first() != null?
                                $about->data->where('lang_id', $lang_id)->first()->objectives :
                                $about->data->first()->objectives !!}
                            </p></div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('front.our_amaizing_team') }}</h2>
                <h3 class="section-subheading text-muted">{{ __('front.our_amaizing_team_description') }}</h3>
            </div>
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-lg-3">
                        <div class="team-member">
                            @foreach($team->media as $media)
                                <img class="mx-auto rounded-circle" src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}" />
                            @endforeach
                            <h4>{{ $team->name }}</h4>
                            <p class="text-muted">{{ $team->position }} </p>
                            <a class="btn btn-dark btn-social mx-2" href="{{ $team->twitter }}" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="{{ $team->facebook }}" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="{{ $team->linkedin }}" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            </div>
        </div>
    </section>
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('Front') }}/assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('Front') }}/assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('Front') }}/assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('Front') }}/assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('front.contact_us') }}</h2>
                <h3 class="section-subheading text-muted">{{ __('front.contact_us_description') }}</h3>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" name="name" type="text" placeholder="{{ __('front.your_name') }} *"data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">{{ __('front.a_name_is_required') }}.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" name="email" type="email" placeholder="{{ __('front.your_email') }} *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">{{ __('front.a_valid_email_is_required') }}.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">{{ __('front.a_valid_email_is_required') }}.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="{{ __('front.your_phone') }} *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">{{ __('front.a_phone_number_is_required') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="message" placeholder="{{ __('front.your_message') }} *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">{{ __('front.a_message_is_required') }}</div>
                        </div>
                    </div>
                </div>
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">{{ __('front.error_send_message') }}!</div></div>
                <!-- Submit Button-->
                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">{{ __('front.send_message') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
