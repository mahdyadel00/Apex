@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}} <small>{{ __('dashboard.all_students')  }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
        @can('create_student')
                    <a class="btn btn-primary m-2"
                      href="{{ route('admin.students.create') }}">{{ __('dashboard.add_student') }}</a>
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
                    <th class="text-center" style="width: 80px;">{{ __('dashboard.serial_number') }}</th>
                    <th class="text-center">{{ __('dashboard.image') }}</th>
                    <th class="text-center">{{ __('dashboard.certificate') }}</th>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <th class="text-center">{{ __('dashboard.phone') }}</th>
                    <th class="text-center">{{ __('dashboard.email') }}</th>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <th class="text-center">{{ __('dashboard.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="text-center">{{ $student->id }}</td>
                        <td class="text-center">{{ $student->serial_number }} </td>
                        <td class="text-center">
                            @foreach($student->media as $media)
                                @if($media->name == 'image')
                                    <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                        <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                             alt="Student Image">
                                    </a>
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center">
                            @foreach($student->media as $media)
                                @if($media->name == 'certificate')
                                    <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                        <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                             alt="{{ __('dashboard.certificate') }}">
                                    </a>
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center"><a href="{{ route('admin.students.show', [$student->id]) }}">{{ $student->name }}</a></td>
                        <td class="text-center">{{ $student->phone }}</td>
                        <td class="text-center">{{ $student->email }}</td>
                        <td class="text-center">{{ date($student->created_at) }}</td>
                        <td class="text-center" style="display: flex;">
                            <button class="btn btn-primary">
                                <a href="{{ route('admin.students.upload', [$student->id]) }}"
                                   class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                   data-original-title="Upload file">
                                    <i class="fa fa-upload"></i>
                                </a>
                            </button>
                            @can('show_student')
                                <button class="btn btn-success">
                                    <a href="{{ route('admin.students.show', [$student->id]) }}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Show user">
                                        <i class="fa fa-eye"></i>
                                    </a></button>
                            @endcan
                            @can('edit_student')
                                <button class="btn btn-info">
                                    <a href="{{ route('admin.students.edit', [$student->id]) }}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Edit user">
                                        <i class="fa fa-edit"></i>
                                    </a></button>
                            @endcan
                            @can('delete_student')
                                <form action="{{ route('admin.students.destroy', [$student->id]) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger" type="submit">
                                        <a href="#" class="text-secondary font-weight-bold text-xs"
                                           data-toggle="tooltip" data-original-title="Delete user">
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
