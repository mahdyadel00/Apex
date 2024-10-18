@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.apex')}}  <small>{{ __('dashboard.all_teams') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @can('create_service')
                <a class="btn btn-primary m-2" href="{{ route('admin.teams.create') }}">{{ __('dashboard.add_team') }}</a>
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
                        <th class="text-center">{{ __('dashboard.image') }}</th>
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <th class="text-center">{{ __('dashboard.position') }}</th>
                        <th class="text-center">{{ __('dashboard.facebook') }}</th>
                        <th class="text-center">{{ __('dashboard.twitter') }}</th>
                        <th class="text-center">{{ __('dashboard.linkedin') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @foreach ($team->media as $media)
                                    <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}"
                                        class="img-thumbnail" style="width: 100px; height: 100px;">
                                @endforeach
                            </td>
                            <td class="text-center">{{ $team->name }}</td>
                            <td class="text-center">{{ $team->position }}</td>
                            <td class="text-center">
                                <a href="{{ $team->facebook }}" target="_blank">{{ __('dashboard.facebook') }}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ $team->twitter }}" target="_blank">{{ __('dashboard.twitter') }}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ $team->linkedin }}" target="_blank">{{ __('dashboard.linkedin') }}</a>
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($team->created_at)) }}</td>
                            <td class="text-center">
                                @can('edit_service')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.teams.edit', [$team->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit quiz">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_service')
                                    <form action="{{ route('admin.teams.destroy', [$team->id]) }}" method="post" style="display: inline-block">
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
