@extends('layouts.Frontend.master')

@section('content')
    <div class="container mt-3">
        @include('layouts.Frontend._message')
        <div class="main-body">

            <div class="row gutters-sm " style="margin: 60px 0;">
                <div class="col-md-8">
                    <form method="post" action="{{ route('company.update' , $service->id) }}">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.email') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"
                                               value="{{ $service->company->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.information') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="information"
                                               value="{{ $service->information }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('front.information_price')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="information_price"
                                               value="{{ $service->information_price }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">{{ __('dashboard.save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.Frontend._footer')
@endsection
