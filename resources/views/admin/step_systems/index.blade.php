@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_step_systems') }}</small>
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
                        <th class="text-center">{{ __('dashboard.country') }}</th>
                        <th class="text-center">{{ __('dashboard.center_name') }}</th>
                        <th class="text-center">{{ __('dashboard.controller_name') }}</th>
                        <th class="text-center">{{ __('dashboard.type') }}</th>
                        <th class="text-center">{{ __('dashboard.lab_name') }}</th>
                        <th class="text-center">{{ __('dashboard.id_number') }}</th>
                        <th class="text-center">{{ __('dashboard.name_ar') }}</th>
                        <th class="text-center">{{ __('dashboard.name_en') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step_systems as $step_system)
                        <tr>
                            <td class="text-center">{{ $step_system->id }}</td>
                            <td class="text-center">
                                {{ $step_system->country->data->where('lang_id', $lang_id)->first() != null?
                               $step_system->country->data->where('lang_id', $lang_id)->first()->name :
                               $step_system->country->data->first()->name }}
                            </td>
                            <td class="text-center">{{ $step_system->center_name }}</td>
                            <td class="text-center">{{ $step_system->controller_name }}</td>
                            <td class="text-center">
                                @if ($step_system->type == 'Step4a')Step4a
                                @else
                                    Step4b
                                @endif
                            </td>
                            <td class="text-center">{{ $step_system->lab_name }}</td>
                            <td class="text-center">{{ $step_system->id_number }}</td>
                            <td class="text-center">{{ $step_system->name_ar }}</td>
                            <td class="text-center">{{ $step_system->name_en }}</td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($step_system->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_post')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.step_systems.show', [$step_system->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show post">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
{{--                                @can('edit_post')--}}
{{--                                    <button class="btn btn-info">--}}
{{--                                        <a href="{{ route('admin.step_systems.edit', [$step_system->id]) }}"--}}
{{--                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"--}}
{{--                                            data-original-title="Edit post">--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a></button>--}}
{{--                                @endcan--}}
                                @can('delete_step_system')
                                    <form action="{{ route('admin.step_systems.destroy', [$step_system->id]) }}" method="post" style="display: inline-block">
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
