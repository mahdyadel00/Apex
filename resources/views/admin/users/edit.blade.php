@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_user') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="first_name">{{ __('dashboard.first_name') }}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                       value="{{ $user->first_name }}" placeholder="{{ __('dashboard.first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="last_name">{{ __('dashboard.last_name') }}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       value="{{ $user->last_name }}" placeholder="{{ __('dashboard.last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="user_name">{{ __('dashboard.user_name') }}</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                       value="{{ $user->user_name }}" placeholder="{{__('dashboard.user_name')}}">
                                @if ($errors->has('user_name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                       name="email" placeholder="{{ __('dashboard.email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="{{ $user->phone }}" placeholder="{{ __('dashboard.phone') }}">
                                @if ($errors->has('hone'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="birth_date">{{ __('dashboard.birth_date') }}</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                       value="{{ $user->birth_date }}" placeholder="{{ __('dasjboard.birth_date') }}">
                                @if ($errors->has('birth_date'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                       placeholder="Image Input" accept="image/jpeg,image/jpg,image/png">
                                @foreach ($user->media as $media)
                                    <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                         alt="{{ $user->first_name }}" class="img-thumbnail" style="margin: 10px"/>
                                @endforeach
                                @if ($errors->has('image'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="address">{{ __('dashboard.address') }}</label>
                                <textarea class="form-control ckeditor" id="address" name="address"
                                          placeholder="{{ __('dashboard.address') }}">{{ $user->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- @dd($user->roles) --}}
                            <div class="mb-4">
                                <label class="form-label" for="roles_name">{{ __('dashboard.roles') }}</label>
                                <select name="roles_name[]" id="roles" class="form-control js-example-basic-multiple"
                                        multiple="multiple">
                                    <option disabled value="0">Select Roles</option>
                                    @foreach ($roles as $role)
                                        <option value={{ $role }}
                                    @if ($role == old('role', $user->roles[0]->name)) selected @endif>
                                            {{ $role }} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('roles'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('roles') }}</strong>
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
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
