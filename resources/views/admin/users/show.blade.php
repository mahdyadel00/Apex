@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.certificate') }} <small>{{ __('dashboard.show_user') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">{{ __('dashboard.image') }}</th>
                    <td class="text-center">
                        @foreach ($user->media as $media)
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $user->first_name }}" class="img-thumbnail" style="margin: 10px"/>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.first_name') }}</th>
                    <td class="text-center">{{ $user->first_name }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.last_name') }}</th>
                    <td class="text-center">{{ $user->last_name }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.user_name') }}</th>
                    <td class="text-center">{{ $user->user_name }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.email') }}</th>
                    <td class="text-center">{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.birth_date') }}</th>
                    <td class="text-center">{{ date($user->birth_date)  }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.status') }}</th>
                    @if ($user->status == 1)
                        <td class="text-center">
                            <span class="badge badge-pill bg-success">{{ __('dashboard.active') }}</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                        </td>
                @endif
                <tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date($user->created_at) }}</td>
                </tr>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
