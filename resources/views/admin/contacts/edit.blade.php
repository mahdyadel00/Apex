@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_client') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('dashboard.name') }}" value="{{ $client->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="{{ __('dashboard.phone') }}" value="{{ $client->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="location">{{ __('dashboard.location') }}</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="{{ __('dashboard.location') }}" value="{{ $client->location }}">
                                @if ($errors->has('location'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="Create">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Elements -->
    </div>
    <!-- END Page Content -->
@endsection
