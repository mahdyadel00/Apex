@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_quizzes') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @can('create_quiz')
                <a class="btn btn-primary" href="{{ route('admin.quizzes.create') }}">{{ __('dashboard.add_quiz') }}</a>
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
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td class="text-center">{{ $quiz->id }}</td>
                            <td class="text-center">
                                {{ $quiz->data->where('lang_id', $lang_id)->first() != null?
                               $quiz->data->where('lang_id', $lang_id)->first()->name :
                               $quiz->data->first()->name }}
                            </td>
                            <td class="text-center">
                                @if ($quiz->is_active == 1)
                                    <span class="badge bg-success">{{ __('dashboard.active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('dashboard.not_active') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($quiz->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_quiz')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.quizzes.show', [$quiz->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show quiz">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_quiz')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.quizzes.edit', [$quiz->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit quiz">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_quiz')
                                    <form action="{{ route('admin.quizzes.destroy', [$quiz->id]) }}" method="post" style="display: inline-block">
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
