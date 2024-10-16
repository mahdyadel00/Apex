@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_appointment') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">{{ $appointment->name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.state_name') }}</th>
                    <td class="text-center">{{ $appointment->state->data->where('lang_id', $lang_id)->first() != null ?
                        $appointment->state->data->where('lang_id', $lang_id)->first()->name :
                        $appointment->state->data->first()->name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.center') }}</th>
                    <td class="text-center">{{ $appointment->center->data->where('lang_id', $lang_id)->first() != null ?
                        $appointment->center->data->where('lang_id', $lang_id)->first()->name :
                        $appointment->center->data->first()->name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.quiz') }}</th>
                    <td class="text-center">{{ $appointment->quiz->data->where('lang_id', $lang_id)->first() != null ?
                        $appointment->quiz->data->where('lang_id', $lang_id)->first()->name :
                        $appointment->quiz->data->first()->name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <td class="text-center">{{ date($appointment->phone)  }}</td>
                </tr>
                {{-- <tr>
                    <th class="text-center">{{ __('dashboard.status') }}</th>
                    @if ($appointment->status == 1)
                        <td class="text-center">
                            <span class="badge badge-pill bg-success">{{ __('dashboard.active') }}</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                        </td>
                @endif
                <tr> --}}
                <tr>
                    <th class="text-center">{{ __('dashboard.date') }}</th>
                    <td class="text-center">{{ date($appointment->date) }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date($appointment->created_at) }}</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
