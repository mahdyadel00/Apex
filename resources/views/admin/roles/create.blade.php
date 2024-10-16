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
                <h3 class="block-title">{{ __('dashboard.create_role') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">{{ __('dashboard.create') }}</h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label required" for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="" style="width: 100%; display: flex; justify-content: space-between; flex-wrap: wrap;">
                                @foreach ($permissions as $permission)
                                <label style="width:220px;">
                                        <input id="{{ $permission->id }}" type="checkbox" name="groups[]"
                                            value="{{ $permission->id }}" data-parsley-multiple="groups" >
                                        <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                        </span>
                                        {{ $permission['name'] }}
                                    </label>
                                @endforeach
                                @if ($errors->has('name'))
                                    <span class="text-danger ">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-4" style="margin:10px 0">
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
