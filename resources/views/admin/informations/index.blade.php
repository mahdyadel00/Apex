@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.all_informations') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_information')
                    <a class="btn btn-primary m-2" href="{{ route('admin.informations.create') }}">{{ __('dashboard.add_information') }}</a>
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
                        <th class="text-center">{{ __('dashboard.title') }}</th>
                        <th class="text-center">{{ __('dashboard.is_active') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $informaation)
                        <tr>
                            <td class="text-center">{{ $informaation->id }}</td>

                            <td class="text-center">
                                {{ $informaation->data->where('lang_id', $lang_id)->first() != null?
                               $informaation->data->where('lang_id', $lang_id)->first()->title :
                               $informaation->data->first()->title }}
                            </td>
                            <td class="text-center">
                                @if ($informaation->is_active == 1)
                                    <span class="badge badge-pill bg-primary">{{ __('dashboard.active') }}</span>
                                @else
                                    <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($informaation->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_information')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.informations.show', [$informaation->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show information">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_information')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.informations.edit', [$informaation->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit information">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_information')
                                    <form action="{{ route('admin.informations.destroy', [$informaation->id]) }}" method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger" type="submit">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete Category">
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
