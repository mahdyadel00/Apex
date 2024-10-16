@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_student_systems') }}</small>
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
                        <th class="text-center">{{ __('dashboard.education_name') }}</th>
                        <th class="text-center">{{ __('dashboard.band_name') }}</th>
                        <th class="text-center">{{ __('dashboard.ranking') }}</th>
                        <th class="text-center">{{ __('dashboard.grading_data') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student_systems as $student_system)
                        <tr>
                            <td class="text-center">{{ $student_system->id }}</td>
                            <td class="text-center">{{ $student_system->education_name }}</td>
                            <td class="text-center">{{ $student_system->band_name }}</td>
                            <td class="text-center">{{ $student_system->ranking }}</td>
                            <td class="text-center">{{ $student_system->grading_data }}</td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($student_system->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_student_system')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.student_systems.show', [$student_system->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show post">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
{{--                                @can('edit_post')--}}
{{--                                    <button class="btn btn-info">--}}
{{--                                        <a href="{{ route('admin.student_systems.edit', [$student_system->id]) }}"--}}
{{--                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"--}}
{{--                                            data-original-title="Edit post">--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a></button>--}}
{{--                                @endcan--}}
                                @can('delete_student_system')
                                    <form action="{{ route('admin.student_systems.destroy', [$student_system->id]) }}" method="post" style="display: inline-block">
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
