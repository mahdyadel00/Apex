@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_quiz') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.post_cover') }}</th>
                    <td class="text-center">
                        @foreach ($company->media as $media)
                                <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                     alt="{{ $company->name }}" class="img-thumbnail" style="margin: 10px"/>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.sector_name') }}</th>
                    <td class="text-center">
                        {{ $company->sector?->data->where('lang_id', $lang_id)->first() != null?
                               $company->sector?->data->where('lang_id', $lang_id)->first()->name :
                               $company->sector?->data->first()->name }}
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.category') }}</th>
                    <td class="text-center">
                        {{ $company->data->where('lang_id', $lang_id)->first() != null?
                               $company->data->where('lang_id', $lang_id)->first()->name :
                               $company->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.post_name') }}</th>
                    <td class="text-center"> {{ $company->email }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <td class="text-center">{{ $company->phone }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($company->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div></div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
