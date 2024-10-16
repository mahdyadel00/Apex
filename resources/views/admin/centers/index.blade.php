@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_centers') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @can('create_center')
                <a class="btn btn-primary" href="{{ route('admin.centers.create') }}">{{ __('dashboard.add_center') }}</a>
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
                        <th class="text-center">{{ __('dashboard.state_name') }}</th>
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <th class="text-center">{{ __('dashboard.is_active') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centers as $center)
                        <tr>
                            <td class="text-center">{{ $center->id }}</td>
                            <td class="text-center">
                                {{ $center->state->data->where('lang_id', $lang_id)->first() != null?
                               $center->state->data->where('lang_id', $lang_id)->first()->name :
                               $center->state->data->first()->name }}
                            </td>
                            <td class="text-center">
                                {{ $center->data->where('lang_id', $lang_id)->first() != null?
                               $center->data->where('lang_id', $lang_id)->first()->name :
                               $center->data->first()->name }}
                            </td>
                            <td class="text-center">
                                @if ($center->is_active == 1)
                                    <span class="badge bg-success">{{ __('dashboard.active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('dashboard.not_active') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($center->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_center')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.centers.show', [$center->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show quiz">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_center')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.centers.edit', [$center->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit quiz">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_center')
                                    <form action="{{ route('admin.centers.destroy', [$center->id]) }}" method="post" style="display: inline-block">
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
