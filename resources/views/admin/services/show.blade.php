@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_service') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">{{ __('dashboard.user_name') }}</th>
                    <td class="text-center">
                        {{ $service->user->user_name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.company_name') }}</th>
                    <td class="text-center">
                        {{ $service->company->data->where('lang_id', $lang_id)->first() != null?
                             $service->company->data->where('lang_id', $lang_id)->first()->name :
                             $service->company->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.useful') }}</th>
                    <td class="text-center">
                        @if ($service->useful == 1)
                            <span class="badge bg-success">{{ __('dashboard.useful') }}</span>
                        @else
                            <span class="badge bg-danger">{{ __('dashboard.not_useful') }}</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.information') }}</th>
                    <td class="text-center">{{ $service->information }}</td>

                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.information_price') }}</th>
                    <td class="text-center">{{ $service->information_price }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($service->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
