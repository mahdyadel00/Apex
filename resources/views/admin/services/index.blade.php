@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.apex')}}  <small>{{ __('dashboard.all_services') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @can('create_service')
                <a class="btn btn-primary m-2" href="{{ route('admin.services.create') }}">{{ __('dashboard.add_service') }}</a>
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
                        <th class="text-center">{{ __('dashboard.service_image') }}</th>
                        <th class="text-center">{{ __('dashboard.title') }}</th>
                        <th class="text-center">{{ __('dashboard.description') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @foreach ($service->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}"
                                        class="img-thumbnail" style="width: 100px; height: 100px;">
                                @endforeach
                            </td>
                            <td class="text-center">
                                {{ $service->data->where('lang_id', $lang_id)->first() != null?
                               $service->data->where('lang_id', $lang_id)->first()->title :
                               $service->data->first()->title }}
                            </td>
                            <td class="text-center">
                                {{ $service->data->where('lang_id', $lang_id)->first() != null?
                               $service->data->where('lang_id', $lang_id)->first()->description :
                               $service->data->first()->description }}
                            </td>

                            <td class="text-center">{{ date('Y-m-d', strtotime($service->created_at)) }}</td>
                            <td class="text-center">
                                @can('edit_service')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.services.edit', [$service->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit quiz">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_service')
                                    <form action="{{ route('admin.services.destroy', [$service->id]) }}" method="post" style="display: inline-block">
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
