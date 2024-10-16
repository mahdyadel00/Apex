@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_sector') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.state_name') }}</th>
                    <td class="text-center">
                        {{ $sector->state->data->where('lang_id', $lang_id)->first() != null?
                             $sector->state->data->where('lang_id', $lang_id)->first()->name :
                             $sector->state->data->first()->name }}
                    </td>
                </tr>


                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">
                        {{ $sector->data->where('lang_id', $lang_id)->first() != null?
                             $sector->data->where('lang_id', $lang_id)->first()->name :
                             $sector->data->first()->name }}
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($sector->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
