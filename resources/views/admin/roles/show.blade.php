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
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                        <th style="width: 15%;">Created At</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td class="fw-semibold">
                                <a href="#">{{ $user->name }}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ date($user->created_at) }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
