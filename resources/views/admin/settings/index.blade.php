@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Quick-Wash <small>All Users</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                @can('create_user')
                    <a class="btn btn-primary m-2" href="{{ route('admin.users.create') }}">{{ __('dashboard.add_user') }}</a>
                @endcan
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>{{ __('dashboard.image') }}</th>
                        <th>{{ __('dashboard.first_name') }}</th>
                        <th>{{ __('dashboard.last_name') }}</th>
                        <th>{{ __('dashboard.user_name') }}</th>
                        <th>{{ __('dashboard.email') }}</th>
                        <th>{{ __('dashboard.created_at') }}</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td class="text-center">
                                <img src="{{ $user->image }}" width="100px" height="100px" alt="">
                            </td>
                            <td class="fw-semibold">
                                <a href="#">{{ $user->first_name }}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">{{ $user->last_name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->user_name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ date($user->created_at) }}</td>
                            <td>
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
