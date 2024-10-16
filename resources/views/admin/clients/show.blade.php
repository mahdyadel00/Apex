@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.taosel') }} <small>{{ __('dashboard.show_client') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">{{ __('dashboard.image') }}</th>
                    <td class="text-center">
                        @foreach($client->media as $media)
                            <img src="{{ asset("storage/". $media->path) }}" alt="{{ $client->user_name }}"
                                 width="50px" height="50px">
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">{{ $client->name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.email') }}</th>
                    <td class="text-center">{{ $client->email }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <td class="text-center">{{ $client->phone }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.address') }}</th>
                    <td class="text-center">{!! $client->address !!}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.is_approved') }}</th>
                    @if ($client->is_approved == 1)
                        <td class="text-center">
                            <span class="badge badge-pill bg-success">{{ __('dashboard.approved') }}</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-pill bg-danger">{{ __('dashboard.disapproved') }}</span>
                        </td>
                @endif
                <tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($client->created_at)) }}</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
