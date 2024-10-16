@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.certificate')}}  <small>{{ __('dashboard.all_cities') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_city')
                    <a class="btn btn-primary m-2" href="{{ route('admin.cities.create') }}">{{ __('dashboard.add_city') }}</a>
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
                        <th class="text-center">{{ __('dashboard.state_name') }}</th>
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <th class="text-center">{{ __('dashboard.is_active') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td class="text-center">{{ $city->id }}</td>
                            <td class="text-center">
                                {{ $city->state->data->where('lang_id', $lang_id)->first() != null ?
                                $city->state->data->where('lang_id', $lang_id)->first()->name :
                                $city->state->data->first()->name }}
                            </td>
                            <td class="text-center">
                                {{ $city->data->where('lang_id', $lang_id)->first() != null?
                               $city->data->where('lang_id', $lang_id)->first()->name :
                               $city->data->first()->name }}
                            </td>
                            <td class="text-center">
                                @if ($city->is_active == 1)
                                    <span class="badge badge-pill bg-primary">{{ __('dashboard.active') }}</span>
                                @else
                                    <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($city->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_city')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.cities.show', [$city->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show city">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_city')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.cities.edit', [$city->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit city">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_city')
                                    <form action="{{ route('admin.cities.destroy', [$city->id]) }}" method="post" style="display: inline-block">
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
