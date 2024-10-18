@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_team') }}</h3>
            </div>
        @include('layouts.admin._message')
            <div class="block-content">
                <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">

                            <div class="mb-4">
                                <label class="form-label" for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('dashboard.name') }}"
                                    value="{{ $team->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                              <div class="mb-4">
                                <label class="form-label" for="position">{{ __('dashboard.position') }}</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="{{ __('dashboard.position') }}"
                                    value="{{ $team->position }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="facebook">{{ __('dashboard.facebook') }}</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="{{ __('dashboard.facebook') }}"
                                    value="{{ $team->facebook }}">
                                @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="twitter">{{ __('dashboard.twitter') }}</label>
                                <input type="text" class="form-control" id="twitter" name="twitter"
                                    placeholder="{{ __('dashboard.twitter') }}"
                                    value="{{ $team->twitter }}">
                                @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="linkedin">{{ __('dashboard.linkedin') }}</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    placeholder="{{ __('dashboard.linkedin') }}"
                                    value="{{ $team->linkedin }}">
                                @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @foreach ($team->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}"
                                        class="img-thumbnail" style="width: 100px; height: 100px;">
                                @endforeach
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
