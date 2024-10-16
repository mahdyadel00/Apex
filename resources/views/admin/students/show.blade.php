@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.certificate') }} <small>{{ __('dashboard.show_student') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">{{ __('dashboard.image') }}</th>
                    <td class="text-center">
                        @foreach ($student->media as $media)
                            @if($media->name == 'image')
                                <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                    <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                         alt="Student Image">
                                </a>
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.certificate') }}</th>
                    <td class="text-center">
                        @foreach ($student->media as $media)
                            @if($media->name == 'certificate')
                                <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                    <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                         alt="{{ __('dashboard.certificate') }}">
                                </a>
                            @endif
                        @endforeach
                    </td>
                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">{{ $student->name }}</td>
                </tr>


                <tr>
                    <th class="text-center">{{ __('dashboard.email') }}</th>
                    <td class="text-center">{{ $student->email }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <td class="text-center">{{ date($student->phone)  }}</td>
                </tr>
                {{-- <tr>
                    <th class="text-center">{{ __('dashboard.status') }}</th>
                    @if ($student->status == 1)
                        <td class="text-center">
                            <span class="badge badge-pill bg-success">{{ __('dashboard.active') }}</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                        </td>
                @endif
                <tr> --}}
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date($student->created_at) }}</td>
                </tr>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
