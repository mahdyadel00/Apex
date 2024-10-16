@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Quick-Wash <small>{{ __('dashboard.show_user') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.image') }}</th>
                        <th>{{ __('dashboard.first_name') }}</th>
                        <th>{{ __('dashboard.last_name') }}</th>
                        <th>{{ __('dashboard.user_name') }}</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">{{ __('dashboard.email') }}</th>
                        <th style="width: 15%;">{{ __('dashboard.created_at') }}</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>
                                <img src="{{ $user->image }}" width="100px" height="100px" alt="">
                            </td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ date($user->created_at) }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
