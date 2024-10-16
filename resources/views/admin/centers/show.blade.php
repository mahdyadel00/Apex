@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_center') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.state_name') }}</th>
                    <td class="text-center">
                        {{ $center->state->data->where('lang_id', $lang_id)->first() != null?
                             $center->state->data->where('lang_id', $lang_id)->first()->name :
                             $center->state->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">
                        {{ $center->data->where('lang_id', $lang_id)->first() != null?
                             $center->data->where('lang_id', $lang_id)->first()->name :
                             $center->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.description') }}</th>
                    <td class="text-center">
                        {!!  $center->data->where('lang_id', $lang_id)->first() != null?
                             $center->data->where('lang_id', $lang_id)->first()->description :
                             $center->data->first()->description !!}
                    </td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.is_active') }}</th>
                    <td class="text-center">
                        @if ($center->is_active == 1)
                            <span class="badge bg-success">{{ __('dashboard.active') }}</span>
                        @else
                            <span class="badge bg-danger">{{ __('dashboard.not_active') }}</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($center->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
