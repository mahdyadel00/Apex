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
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="{{ __('dashboard.email') }}" value="{{ $client->email }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{ __('dashboard.phone') }}" value="{{ $client->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="address">{{ __('dashboard.address') }}</label>
                                <textarea type="text" class="form-control ckeditor" id="address" name="address" placeholder="Address Input">{{ $client->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="image Input" accept="image/jpeg,image/jpg,image/png">
                                @foreach($client->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $client->first_name }}"
                                         width="100px" height="100px" class="img-thumbnail" style="margin: 10px"/>
                                @endforeach
                                @if ($errors->has('image'))
                                            <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="is_approved">{{ __('dashboard.is_approved') }}</label>
                                <input type="checkbox"  id="is_approved" name="is_approved" value="1"
                                    placeholder="is_approved Input"  {{ $client->is_approved == 1 ? 'checked' : '' }}>
                                @if ($errors->has('is_approved'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_approved') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="{{ __('dashboard.edit') }}">
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
