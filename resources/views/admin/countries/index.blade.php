@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.all_countries') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_country')
                    <a class="btn btn-primary" href="{{ route('admin.countries.create') }}">{{ __('dashboard.add_country') }}</a>
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
                        <th class="text-center">{{ __('dashboard.is_active') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                        <tr>
                            <td class="text-center">{{ $country->id }}</td>
                            <td class="text-center">
                                {{ $country->data->where('lang_id', $lang_id)->first() != null?
                               $country->data->where('lang_id', $lang_id)->first()->name :
                               $country->data->first()->name }}
                            </td>
                            <td class="text-center">
                                @if ($country->is_active == 1)
                                    <span class="badge badge-pill bg-primary">{{ __('dashboard.active') }}</span>
                                @else
                                    <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($country->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_country')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.countries.show', [$country->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show country">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_country')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.countries.edit', [$country->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit country">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_country')
                                    <form action="{{ route('admin.countries.destroy', [$country->id]) }}" method="post" style="display: inline-block">
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
