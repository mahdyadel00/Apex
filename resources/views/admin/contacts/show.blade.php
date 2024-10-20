@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_contact') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <td class="text-center">{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.email') }}</th>
                        <td class="text-center">{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.phone') }}</th>
                        <td class="text-center">{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.subject') }}</th>
                        <td class="text-center">{{ $contact->subject }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.message') }}</th>
                        <td class="text-center">{{ $contact->message }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <td class="text-center">{{ date('Y-m-d', strtotime($contact->created_at)) }}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
