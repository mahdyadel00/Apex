@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}} <small>{{ __('dashboard.all_appointments')  }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_appointment')
                    <a class="btn btn-primary m-2"
                       href="{{ route('admin.appointments.create') }}">{{ __('dashboard.add_appointment') }}</a>
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
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <th class="text-center">{{ __('dashboard.state_name') }}</th>
                    <th class="text-center">{{ __('dashboard.center') }}</th>
                    <th class="text-center">{{ __('dashboard.quiz') }}</th>
                    <th class="text-center">{{ __('dashboard.date') }}</th>
                    <th class="text-center">{{ __('dashboard.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td class="text-center">{{ $appointment->id }}</td>

                        <td class="text-center">
                            <a href="{{ route('admin.appointments.show', [$appointment->id]) }}">{{ $appointment->name }}</a>
                        </td>
                        <td class="text-center">{{ $appointment->phone }}</td>
                        <td class="text-center">
                            {{ $appointment->state->data->where('lang_id', $lang_id)->first() != null ?
                            $appointment->state->data->where('lang_id', $lang_id)->first()->name :
                            $appointment->state->data->first()->name }}
                        </td>

                        <td class="text-center">
                            {{ $appointment->center->data->where('lang_id', $lang_id)->first() != null ?
                            $appointment->center->data->where('lang_id', $lang_id)->first()->name :
                            $appointment->center->data->first()->name }}
                        </td>
                        <td class="text-center">
                            {{ $appointment->quiz->data->where('lang_id', $lang_id)->first() != null ?
                            $appointment->quiz->data->where('lang_id', $lang_id)->first()->name :
                            $appointment->quiz->data->first()->name }}
                        </td>
                        <td class="text-center">{{ date($appointment->date) }}</td>
                        <td class="text-center" style="display: flex;">
                            @can('show_appointment')
                                <button class="btn btn-success">
                                    <a href="{{ route('admin.appointments.show', [$appointment->id]) }}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Show user">
                                        <i class="fa fa-eye"></i>
                                    </a></button>
                            @endcan
                            @can('edit_appointment')
                                <button class="btn btn-info">
                                    <a href="{{ route('admin.appointments.edit', [$appointment->id]) }}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Edit user">
                                        <i class="fa fa-edit"></i>
                                    </a></button>
                            @endcan
                            @can('delete_appointment')
                                <form action="{{ route('admin.appointments.destroy', [$appointment->id]) }}" method="post"
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
