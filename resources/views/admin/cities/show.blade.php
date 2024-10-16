@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_city') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.state_name') }}</th>
                    <td class="text-center">
                        {{ $city->state->data->where('lang_id', $lang_id)->first() != null?
                             $city->state->data->where('lang_id', $lang_id)->first()->name :
                             $city->state->data->first()->name }}
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">
                        {{ $city->data->where('lang_id', $lang_id)->first() != null?
                             $city->data->where('lang_id', $lang_id)->first()->name :
                             $city->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.is_active') }}</th>
                    <td class="text-center">
                        @if ($city->is_active == 1)
                            <span class="badge badge-pill bg-primary">{{ __('dashboard.active') }}</span>
                        @else
                            <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($city->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
