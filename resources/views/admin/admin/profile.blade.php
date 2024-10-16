@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.edit_user') }}</h3>
            </div>
            @include('layouts.admin._message')
            <div class="block-content">
                <form action="{{ route('admin.profile.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.edit') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label" for="first_name">{{ __('dashboard.first_name') }}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ auth()->user()->first_name }}" placeholder="First Name">
                                @if ($errors->has('first_name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="last_name">{{ __('dashboard.last_name') }}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ auth()->user()->last_name }}" placeholder="Last Name">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="user_name">{{ __('dashboard.user_name') }}</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    value="{{ auth()->user()->user_name }}" placeholder="User Name">
                                @if ($errors->has('user_name'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ auth()->user()->email }}" name="email" placeholder="Emai Input">
                                @if ($errors->has('email'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- <div class="mb-4">
                                <label class="form-label" for="password">{{ __('dashboard.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password Input" value="{{ auth()->user()->password }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label"
                                    for="password_confirmation">{{ __('dashboard.password_confirmation') }}</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Password confirmation Input"
                                    value="{{ auth()->user()->password }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                            <div class="mb-4">
                                <label class="form-label" for="birth_date">{{ __('dashboard.birth_date') }}</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    value="{{ auth()->user()->birth_date }}" placeholder="BirthDate Input">
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
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" width="100px"
                                    height="100px" alt="{{ auth()->user()->first_name }}"
                                    class="img-thumbnail" style="margin: 10px" />
                                @if ($errors->has('image'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="status">{{ __('dashboard.status') }}</label>
                                <input type="checkbox" id="status" name="status" placeholder="Status Input"
                                    {{ auth()->user()->status == 1 ? 'checked' : '' }}>
                                @if ($errors->has('status'))
                                    <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="status">{{ __('dashboard.roles') }}</label>
                                <select name="roles_name[]" id="roles" class="form-control js-example-basic-multiple"
                                    multiple="multiple">
                                    <option disabled value="0">{{ __('dashboard.select_roles') }}</option>
                                    @foreach ($roles as $role)
                                        <option value={{ $role }}>{{ $role }} </option>
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
