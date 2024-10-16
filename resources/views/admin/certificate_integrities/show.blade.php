@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_certificate_integrite') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.country') }}</th>
                    <td class="text-center">
                        {{ $certificate_integrity->country->data->where('lang_id', $lang_id)->first() != null?
                               $certificate_integrity->country->data->where('lang_id', $lang_id)->first()->name :
                               $certificate_integrity->country->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.post_image') }}</th>
                    <td class="text-center">
                        @foreach ($certificate_integrity->media as $media)
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $certificate_integrity->title }}" class="img-thumbnail" style="margin: 10px"/>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.company_name') }}</th>
                    <td class="text-center">{{ $certificate_integrity->company_name }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.company_address') }}</th>
                    <td class="text-center">{{ $certificate_integrity->company_address }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.manager_name') }}</th>
                    <td class="text-center">{{ $certificate_integrity->manager_name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.person_name') }}</th>
                    <td class="text-center">{{ $certificate_integrity->person_name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.id_number') }}</th>
                    <td class="text-center">{{ $certificate_integrity->id_number }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.gscore') }}</th>
                    <td class="text-center">{{ $certificate_integrity->gscore }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.country_destination') }}</th>
                    <td class="text-center">{{ $certificate_integrity->country_destination }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.destination_port') }}</th>
                    <td class="text-center">{{ $certificate_integrity->destination_port }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.notes') }}</th>
                    <td class="text-center">{!! $certificate_integrity->notes !!}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($certificate_integrity->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
