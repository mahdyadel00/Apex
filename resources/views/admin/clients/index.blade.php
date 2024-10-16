@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.taosel') }} <small>{{ __('dashboard.all_clients') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_driver')
                    <a class="btn btn-primary m-2" href="{{ route('admin.clients.create') }}">{{ __('dashboard.add_client') }}</a>
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
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <th class="text-center">{{ __('dashboard.email') }}</th>
                        <th class="text-center">{{ __('dashboard.phone') }}</th>
                        <th class="text-center">{{ __('dashboard.is_approved') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="text-center">{{ $client->id }}</td>

                            <td class="text-center">{{ $client->name }}</td>
                            <td class="text-center">{{ $client->email }}</td>
                            <td class="text-center">{{ $client->phone }}</td>
                            <td class="text-center">
                                @if ($client->is_approved == 1)
                                    <span class="badge badge-pill bg-primary">{{ __('dashboard.approved') }}</span>
                                @else
                                    <span class="badge badge-pill bg-danger">{{ __('dashboard.disapproved') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($client->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_driver')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.clients.show', [$client->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show driver">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_driver')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.clients.edit', [$client->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit driver">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_driver')
                                    <form action="{{ route('admin.clients.destroy', [$client->id]) }}" method="post"
                                        style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger" type="submit">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete driver">
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
