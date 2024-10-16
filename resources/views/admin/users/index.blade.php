@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}} <small>{{ __('dashboard.all_users')  }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_user')
                    <a class="btn btn-primary m-2"
                       href="{{ route('admin.users.create') }}">{{ __('dashboard.add_user') }}</a>
                @endcan
                @include('layouts.admin._message')
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">

                <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">#</th>
                    <th class="text-center">{{ __('dashboard.image') }}</th>
                    <th class="text-center">{{ __('dashboard.first_name') }}</th>
                    <th class="text-center">{{ __('dashboard.last_name') }}</th>
                    <th class="text-center">{{ __('dashboard.user_name') }}</th>
                    <th class="text-center">{{ __('dashboard.email') }}</th>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <th class="text-center">{{ __('dashboard.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">
                            @foreach($user->media as $media)
                                <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                     alt="User Image">
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.users.show', [$user->id]) }}">{{ $user->first_name }}</a>
                        </td>
                        <td class="text-center">{{ $user->last_name }}</td>
                        <td class="text-center">{{ $user->user_name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ date($user->created_at) }}</td>
                        <td class="text-center" style="display: flex;">
                            @can('show_user')
                                <button class="btn btn-success">
                                    <a href="{{ route('admin.users.show', [$user->id]) }}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Show user">
                                        <i class="fa fa-eye"></i>
                                    </a></button>
                            @endcan
                            @can('edit_user')
                                <button class="btn btn-info">
                                    <a href="{{ route('admin.users.edit', [$user->id]) }}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Edit user">
                                        <i class="fa fa-edit"></i>
                                    </a></button>
                            @endcan
                            @can('delete_user')
                                <form action="{{ route('admin.users.destroy', [$user->id]) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger" type="submit">
                                        <a href="#" class="text-secondary font-weight-bold text-xs"
                                           data-toggle="tooltip" data-original-title="Delete user">
                                            <i class="fa fa-trash"></i>
                                        </a></button>
                                    @endcan
                                </form><!-- end of form -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
