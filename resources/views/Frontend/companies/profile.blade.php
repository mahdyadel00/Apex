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
                                @foreach($company->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}"
                                         alt="{{ $company->data->where('lang_id', $lang_id)->first()->name }}"
                                         class="rounded-circle" width="150">
                                @endforeach
                                <div class="mt-3">
                                    <h4>{{ $company->email }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form method="post" action="{{ route('company_profile.update') }}">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.email') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"
                                               value="{{ Auth::guard('company')->user()->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('dashboard.phone') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone"
                                               value="{{ Auth::guard('company')->user()->phone }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('front.wallet')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="wallet"
                                               value="{{ Auth::guard('company')->user()->services->max('information_price') }}">
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
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('front.request_job_training') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('front.email') }}</th>
                                            <th scope="col">{{ __('front.useful') }}</th>
                                            <th scope="col">{{ __('front.information') }}</th>
                                            <th scope="col">{{ __('front.information_price') }}</th>
                                            <th scope="col">{{ __('front.action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Auth::guard('company')->user()->services as $key => $service)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>
                                                    {{ $service->company->email}}
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
                                                <td>
                                                    <a href="{{ route('company.edit', $service->id) }}"
                                                       class="btn btn-warning">{{ __('dashboard.edit') }}</a>
                                                    <form method="post" action="{{ route('company.destroy', $service->id) }}"
                                                          style="display: inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"
                                                                onclick="return confirm('Are you sure?')">{{ __('dashboard.delete') }}</button>
                                                    </form>
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
