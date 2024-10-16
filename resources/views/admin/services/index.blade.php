@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_services') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @include('layouts.admin._message')
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">

                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th class="text-center">{{ __('dashboard.company_name') }}</th>
                        <th class="text-center">{{ __('dashboard.useful') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td class="text-center">{{ $service->id }}</td>
                            <td class="text-center">
                                {{ $service->company->data->where('lang_id', $lang_id)->first() != null?
                               $service->company->data->where('lang_id', $lang_id)->first()->name :
                               $service->company->data->first()->name }}
                            </td>
                            <td class="text-center">
                                @if ($service->useful == 1)
                                    <span class="badge bg-success">{{ __('dashboard.useful') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('dashboard.not_useful') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($service->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_service')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.services.show', [$service->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show service">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_service')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.services.edit', [$service->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit quiz">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_service')
                                    <form action="{{ route('admin.services.destroy', [$service->id]) }}" method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger" type="submit">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete City">
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
