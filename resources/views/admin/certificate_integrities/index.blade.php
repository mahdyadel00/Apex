@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_certificate_integrites') }}</small>
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
                        <th class="text-center">{{ __('dashboard.company_name') }}</th>
                        <th class="text-center">{{ __('dashboard.company_address') }}</th>
                        <th class="text-center">{{ __('dashboard.manager_name') }}</th>
                        <th class="text-center">{{ __('dashboard.person_name') }}</th>
                        <th class="text-center">{{ __('dashboard.id_number') }}</th>
                        <th class="text-center">{{ __('dashboard.gscore') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificate_integrities as $certificate_integrity)
                        <tr>
                            <td class="text-center">{{ $certificate_integrity->id }}</td>
                            <td class="text-center">
                                {{ $certificate_integrity->country->data->where('lang_id', $lang_id)->first() != null?
                               $certificate_integrity->country->data->where('lang_id', $lang_id)->first()->name :
                               $certificate_integrity->country->data->first()->name }}
                            </td>
                            <td class="text-center">{{ $certificate_integrity->company_name }}</td>
                            <td class="text-center">{{ $certificate_integrity->company_address }}</td>
                            <td class="text-center">{{ $certificate_integrity->manager_name }}</td>
                            <td class="text-center">{{ $certificate_integrity->person_name }}</td>
                            <td class="text-center">{{ $certificate_integrity->id_number }}</td>
                            <td class="text-center">{{ $certificate_integrity->gscore }}</td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($certificate_integrity->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_post')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.certificate_integrity.show', [$certificate_integrity->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show post">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
{{--                                @can('edit_post')--}}
{{--                                    <button class="btn btn-info">--}}
{{--                                        <a href="{{ route('admin.certificate_integrity.edit', [$certificate_integrity->id]) }}"--}}
{{--                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"--}}
{{--                                            data-original-title="Edit post">--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a></button>--}}
{{--                                @endcan--}}
                                @can('delete_certificate_integrity')
                                    <form action="{{ route('admin.certificate_integrity.destroy', [$certificate_integrity->id]) }}" method="post" style="display: inline-block">
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
