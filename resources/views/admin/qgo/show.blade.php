@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.certificate') }} <small>{{ __('dashboard.show_qgo') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">{{ $qgo->name }}</td>
                </tr>


                <tr>
                    <th class="text-center">{{ __('dashboard.email') }}</th>
                    <td class="text-center">{{ $qgo->email }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <td class="text-center">{{ date($qgo->phone)  }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date($qgo->created_at) }}</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
