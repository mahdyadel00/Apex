@extends('layouts.Frontend.master')

@section('content')
    <div class="container mt-3">
        @include('layouts.Frontend._message')
        <div class="main-body">

            <div class="row gutters-sm " style="margin: 60px 0;">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ Auth::guard('web')->user()->user_name }}</h4>
{{--                                    <p class="text-secondary mb-1">{{ Auth::guard('web')->user()->serial_number }}</p>--}}
                                    {{-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.name') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::guard('web')->user()->user_name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.email') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ Auth::guard('web')->user()->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.phone') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ Auth::guard('web')->user()->phone }}">
                                    </div>
                                </div>
                                <hr>
                                {{-- <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        (320) 380-4539
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Bay Area, San Francisco, CA
                                    </div>
                                </div>
                                <hr> --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">{{ __('dashboard.save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
{{--                create table  for show services data--}}
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('front.services') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ __('front.company_name') }}</th>
                                                <th scope="col">{{ __('front.useful') }}</th>
                                                <th scope="col">{{ __('front.information') }}</th>
                                                <th scope="col">{{ __('front.inform ation_price') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Auth::guard('web')->user()->services as $key => $service)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>
                                                        {{ $service->company->data->where('lang_id', $lang_id)->first() != null
                                                            ? $service->company->data->where('lang_id', $lang_id)->first()->name
                                                            : $service->company->data->first()->name }}
                                                    </td>
                                                    <td>
                                                        @if ($service->useful == 1)
                                                            <span class="badge bg-success">{{ __('dashboard.useful') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('dashboard.not_useful') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $service->information }}</td>
                                                    <td>{{ $service->information_price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.Frontend._footer')
@endsection
