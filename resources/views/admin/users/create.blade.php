@extends('layouts.admin.app')

@section('content')
    <!-- Page Content -->
    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('dashboard.create_user') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="first_name">{{ __('dashboard.first_name') }}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="{{ __('dashboard.first_name')  }}" value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="last_name">{{ __('dashboard.last_name') }}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="{{ __('dashboard.last_name')  }}" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="user_name">{{ __('dashboard.user_name') }}</label>
                                <input type="text" class="form-control" id="name" name="user_name"
                                    placeholder="{{ __('dashboard.user_name')  }}" value="{{ old('user_name') }}">
                                @if ($errors->has('user_name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="email">{{ __('dashboard.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="{{ __('dashboard.email')  }}" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="password">{{ __('dashboard.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="{{ __('dashboard.password')  }}" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required"
                                    for="password_confirmation">{{ __('dashboard.confirmation_password') }}</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="{{ __('dashboard.confirmation_password') }}" value="{{ old('password_confirmation') }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="mb-4">
                                <label class="form-label required" for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="{{__('dashboard.phone')}}" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="mb-4">
                                <label class="form-label required" for="birth_date">{{ __('dashboard.birth_date') }}</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    placeholder="{{ __('dashboard.date_birth') }}" value="{{ old('birth_date') }}">
                                @if ($errors->has('birth_date'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label " for="image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="{{ __('dashboard.image') }}" required>
                                @if ($errors->has('image'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label required" for="address">{{ __('dashboard.address') }}</label>
                                <textarea class="form-control ckeditor" id="address" name="address"
                                    placeholder="{{ __('dashboard.address') }}">{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label required" for="roles_name">{{ __('dashboard.roles') }}</label>
                                <select name="roles_name[]" id="roles" class="form-control js-example-basic-multiple"
                                    multiple="multiple">
                                    <option disabled value="0">Select Roles</option>
                                    @foreach ($roles as $role)
                                        <option>{{ $role }}</option>
                                    @endforeach
                                    @if ($errors->has('roles_name'))
                                        <span class="text-danger ">
                                            <strong>{{ $errors->first('roles_name') }}</strong>
                                        </span>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-4">
                                <input class="btn btn-primary" type="submit" value="{{ __('dashboard.create') }}">
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
